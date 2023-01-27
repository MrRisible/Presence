import cv2
import numpy as np
import face_recognition
import os
path = 'images'
imagess = []
classNames = []
myList = os.listdir(path)
print(myList)
for cl in myList:
   curImg = cv2.imread(f'{path}/{cl}')
   imagess.append(curImg)
   classNames.append(os.path.splitext(cl)[0])
print(classNames)

def findEncoding(imagess):
   encodedList = []
   for img in imagess:
      img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
      encode = face_recognition.face_encodings(img)[0]
      encodedList.append(encode)
   return encodedList

encodedListK= findEncoding(imagess)
print(len(encodedListK))

cap = cv2.VideoCapture(2)

while True:
   success, img = cap.read()
   imgS = cv2.resize(img,(0,0),None,0.25,0.25)
   imgS = cv2.cvtColor(imgS,cv2.COLOR_BGR2RGB)
   
   faceInFrame = face_recognition.face_locations(imgS)
   encodeCurF = face_recognition.face_encodings(imgS,faceInFrame)

   for encodeFace,faceLoc in zip(encodeCurF,faceInFrame):
      matches = face_recognition.compare_faces(encodedListK,encodeFace)
      faceDis = face_recognition.face_distance(encodedListK,encodeFace)
      print(faceDis)
      matchIndex = np.argmin(faceDis)

      if matches[matchIndex]:
         name = classNames[matchIndex].upper()
         print(name)
         y1, x2, y2, x1 = faceLoc
         y1, x2, y2, x1 = y1*4,x2*4,y2*4,x1*4
         cv2.rectangle(img, (x1+1,y1+1),(x2+1,y2+1), (255,0,0),2)
         cv2.putText(img,name,(x1-5, y2+25) ,cv2.FONT_HERSHEY_SIMPLEX,1,(0,0,0),2) 
   cv2.imshow('Webcam',img)
   cv2.waitKey(1)
