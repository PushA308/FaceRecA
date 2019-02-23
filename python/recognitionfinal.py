#!/usr/bin/env python
import cv2
import numpy as np
#import MySQLdb


recognizer = cv2.createLBPHFaceRecognizer()
recognizer.load('trainnerequal.yml')
cascadePath = "C:\Drivers and setup\opencv\sources\data\haarcascades\haarcascade_frontalface_default.xml"
faceCascade = cv2.CascadeClassifier(cascadePath);
font = cv2.cv.InitFont(cv2.cv.CV_FONT_HERSHEY_SIMPLEX, 1, 1, 0, 1, 1)

img = cv2.imread('group.jpg')
gray = cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)
data=""
faces=faceCascade.detectMultiScale(gray, 1.2,5)
for(x,y,w,h) in faces:
				cv2.rectangle(img,(x,y),(x+w,y+h),(225,0,0),2)
				Id, conf = recognizer.predict(gray[y:y+h,x:x+w])
				if(conf<80):
						if(Id==1):
								Id="Amruta"
								data=data+"|"+"2015BIT202"
								#cv2.cv.PutText(cv2.cv.fromarray(img),str(Id),(x,y+h),font, 255)
						elif(Id==2):
								Id="Sanjivani"
								data=data+"|"+"2015BIT208"
								#cv2.cv.PutText(cv2.cv.fromarray(img),str(Id),(x,y+h),font, 255)
						elif(Id==3):
								Id="mahesh"
								data=data+"|"+"2014BIT013"
								#cv2.cv.PutText(cv2.cv.fromarray(img),str(Id),(x,y+h),font, 255)
						elif(Id==4):
								Id="prajkta"
								data=data+"|"+"2015BIT203"
								#cv2.cv.PutText(cv2.cv.fromarray(img),str(Id),(x,y+h),font, 255)
						elif(Id==5):
								Id="harsh"
								data=data+"|"+"2015BIT213"
								#cv2.cv.PutText(cv2.cv.fromarray(img),str(Id),(x,y+h),font, 255)
						elif(Id==6):
								Id="prashali"
								data=data+"|"+"2014BIT203"
								#cv2.cv.PutText(cv2.cv.fromarray(img),str(Id),(x,y+h),font, 255)
				else:
								Id="Unknown"
								#cv2.cv.PutText(cv2.cv.fromarray(img),str(Id),(x,y+h),font, 255)
cv2.imshow('img',img) 
#if cv2.waitKey(5) & 0xFF==ord('q'):
	#break
#with open ("test_write.txt", "w") as myfile:
	#myfile.write(data)
cv2.imwrite("groupresult.jpg",img)

cv2.waitKey(0)
#cam.release()
cv2.destroyAllWindows()

