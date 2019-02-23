import numpy as np
import cv2

face_cascade = cv2.CascadeClassifier('/home/nilesh/opencv-2.4.11/data/haarcascades/haarcascade_frontalface_default.xml')
eye_cascade = cv2.CascadeClassifier('/home/nilesh/opencv-2.4.11/data/haarcascades/haarcascade_eye.xml')

cap= cv2.VideoCapture('group/Group.mp4')
id=raw_input('Enter Roll No:-')
sample_no=0
while True:
	cv2.waitKey(10)
	ret, img= cap.read()
	gray = cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)
	faces = face_cascade.detectMultiScale(gray,1.3,5)
	for(x,y,w,h) in faces:
		sample_no=sample_no+1
		cv2.imwrite("group/DataSet4/user."+str(id)+"."+str(sample_no)+".jpg",gray[y:y+h,x:x+w])
		print "group/Dataset4/user."+str(id)+"."+str(sample_no)+".jpg"
		cv2.rectangle(img,(x,y),(x+w,y+h),(255,0,0),2)
		#roi_gray=gray[y:y+h,x:x+w]
		#roi_color=img[y:y+h,x:x+w]
		#eyes=eye_cascade.detectMultiScale(roi_gray)
		#for (ex,ey,ew,eh) in eyes:
		#	cv2.rectangle(roi_color,(ex,ey),(ex+ew,ey+eh),(0,255,0),2)
	
	cv2.imshow('img',img)
	k=cv2.waitKey(30) & 0xff
	if (sample_no == 27): 
		break

cap.release()
cv2.destroyAllWindows() 		
