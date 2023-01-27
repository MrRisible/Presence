import cv2
import numpy as np
import face_recognition
import os
import time
path = 'images'
imagess = []
classNames = []
myList = os.listdir(path)

for cl in myList:
   curImg = cv2.imread(f'{path}/{cl}')
   imagess.append(curImg)
   classNames.append(os.path.splitext(cl)[0])

def countdown(t):
    
    while t:
        mins, secs = divmod(t, 60)
        timer = '{:02d}:{:02d}'.format(mins, secs)
        time.sleep(1)
        t -= 1


def findEncoding(imagess):
   encodedList = []
   for img in imagess:
      img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
      encode = face_recognition.face_encodings(img)[0]
      encodedList.append(encode)
   return encodedList

encodedListK= findEncoding(imagess)


cap = cv2.VideoCapture(2, cv2.CAP_DSHOW)
cap.set(cv2.CAP_PROP_FRAME_WIDTH, 640)
cap.set(cv2.CAP_PROP_FRAME_HEIGHT, 480)
count =0

while True:
   success, img = cap.read()
   imgS = cv2.resize(img,(0,0),None,0.25,0.25)
   imgS = cv2.cvtColor(imgS,cv2.COLOR_BGR2RGB)
   myList ={}
   
   faceInFrame = face_recognition.face_locations(imgS)
   encodeCurF = face_recognition.face_encodings(imgS,faceInFrame)
   
   for encodeFace,faceLoc in zip(encodeCurF,faceInFrame):
      matches = face_recognition.compare_faces(encodedListK,encodeFace)
      faceDis = face_recognition.face_distance(encodedListK,encodeFace)
      matchIndex = np.argmin(faceDis)

      if matches[matchIndex]:

         name = classNames[matchIndex].upper()
         y1, x2, y2, x1 = faceLoc
         y1, x2, y2, x1 = y1*4,x2*4,y2*4,x1*4
         cv2.rectangle(img, (x1+1,y1+1),(x2+1,y2+1), (255,0,0),2)
         cv2.putText(img,name,(10,30) ,cv2.FONT_HERSHEY_SIMPLEX,1,(255,0,0),2)
         
      
   cv2.imshow('PRESENCE',img)
   key = cv2.waitKey(1)
   if key == 27:
      break

cap.release()
cv2.destroyAllWindows()
