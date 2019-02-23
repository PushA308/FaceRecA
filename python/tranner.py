import os
import cv2
import numpy as np
from PIL import Image

recognizer=cv2.createLBPHFaceRecognizer();
path='DataSet'

def getImageWithID(path):
	imagePaths=[os.path.join(path,f) for f in os.listdir(path)]
	faces=[]
	IDs=[]
	for imagePath in imagePaths:
		faceImage=Image.open(imagePath).convert('L');
