#!/usr/bin/python
import RPi.GPIO as GPIO

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

pins = [27, 22, 11, 5, 19, 26, 20, 21]

GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
