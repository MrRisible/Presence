import cv2
import numpy as np
import face_recognition
import os
from datetime import datetime
import mysql.connector
import time
import pandas as pd
from playsound import playsound
import serial

ser=serial.Serial(port='COM11', baudrate=9600,timeout=0.5)
number1=' '
mydb = mysql.connector.connect(
  host="127.0.0.1",
  user="root",
  password="",
  database="presence_db"
)

path = 'student_img'
imagess = []
classNames = []
myList = os.listdir(path)

for cl in myList:
   curImg = cv2.imread(f'{path}/{cl}')
   imagess.append(curImg)
   classNames.append(os.path.splitext(cl)[0])

def pandaOut(name):
   data = pd.read_csv("attendance.csv")
   Row_list=[]
   data_with_index = data.set_index("Name")
   data_with_index.head()
   for index, rows in data.iterrows():
      my_list =[rows.Name]
      Row_list.extend(my_list)
   if name in Row_list:
      data_with_index = data_with_index.drop(name)
      insertstudent(name)
      data_with_index.to_csv('attendance.csv')
      getphonenumber(name)
      sendmessage(name)
      playsound('C:/xampp/htdocs/Presence2/asset/playsound.wav')
   else:
      print("Found")
      
def getphonenumber(name):
    headers =['Name','Number']
    mycursor = mydb.cursor()
    mycursor.execute("SELECT CONCAT (s.FirstName,' ',s.LastName) AS Fullname,g.TelPhone from student_info s inner join guardian_info g on s.StudentID = g.Stud_ID")
    myresult = mycursor.fetchall()
    content =myresult
    data = pd.DataFrame(content,columns=headers)
    slctd=data[data['Name'] == name]
    data2=slctd['Number'].values.astype(str)
    global number1
    number1 = str(data2[0])
    

def sendmessage(name):
   global number1
   dtstring = time.strftime("%I:%M %p")
   mssg="Your student "+name+" is outside the campus \nTime: "+dtstring+"\r"
   command_variable = chr(26)
   cmd="AT\r"
   ser.write(cmd.encode())
   msg=ser.read(64)
   cmd="AT+CMGF=1\r"
   ser.write(cmd.encode())
   msg=ser.read(64)
   cmd="AT+CMGS=\""+number1+"\"\r"
   ser.write(cmd.encode())
   msg=ser.read(64)
   ser.write(mssg.encode())
   ser.write(command_variable.encode('utf-8'))
   msg=ser.read(64)
   ser.flushInput()
   ser.flushOutput()
   time.sleep(.5)
   
def findEncoding(imagess):
   encodedList = []
   for img in imagess:
      img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
      encode = face_recognition.face_encodings(img)[0]
      encodedList.append(encode)
   return encodedList

def insertstudent(name):
   mycursor = mydb.cursor()
   now = datetime.now()
   sql = "INSERT INTO studentout (Name, Date, Time) VALUES (%s,%s,%s)"
   dstring = now.strftime("%d/%m/%Y")
   tstring = now.strftime("%I:%M:%S %p")
   val = (name,dstring,tstring)
   mycursor.execute(sql,val)
   mydb.commit()
  
encodedListK= findEncoding(imagess)
cap = cv2.VideoCapture(0, cv2.CAP_DSHOW)
cap.set(cv2.CAP_PROP_FRAME_WIDTH, 640)
cap.set(cv2.CAP_PROP_FRAME_HEIGHT, 480)
while True:
   success, img = cap.read()
   imgS = cv2.resize(img,(0,0),None,0.25,0.25)
   imgS = cv2.cvtColor(imgS,cv2.COLOR_BGR2RGB)
   faceInFrame = face_recognition.face_locations(imgS)
   encodeCurF = face_recognition.face_encodings(imgS,faceInFrame)
   for encodeFace,faceLoc in zip(encodeCurF,faceInFrame):
      matches = face_recognition.compare_faces(encodedListK,encodeFace)
      faceDis = face_recognition.face_distance(encodedListK,encodeFace)
      if (np.any(faceDis<=0.4)):
         matchIndex = np.argmin(faceDis)
         y1, x2, y2, x1 = faceLoc
         y1, x2, y2, x1 = y1*4,x2*4,y2*4,x1*4
         cv2.rectangle(img, (x1+1,y1+1),(x2+1,y2+1), (255,0,0),2)
         name = classNames[matchIndex]
         cv2.putText(img,name,(10,30) ,cv2.FONT_HERSHEY_SIMPLEX,1,(255,0,0),2)
         pandaOut(name)
      else:
         cv2.putText(img,"Unknown Face",(10,30) ,cv2.FONT_HERSHEY_SIMPLEX,1,(255,0,0),2)
         y1, x2, y2, x1 = faceLoc
         y1, x2, y2, x1 = y1*4,x2*4,y2*4,x1*4
         cv2.rectangle(img, (x1+1,y1+1),(x2+1,y2+1), (255,0,0),2)
   
   cv2.imshow('Webcam Out',img)
   key = cv2.waitKey(1)
   if key == 27:
      break

   

cap.release()
cv2.destroyAllWindows()
