#!/usr/bin/python
import RPi.GPIO as GPIO

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

pins = [4, 17, 27, 22, 10, 9, 11, 5, 6, 13, 19, 26, 12, 16, 20, 21]

GPIO.setup(pins, GPIO.OUT, initial=GPIO.HIGH)
