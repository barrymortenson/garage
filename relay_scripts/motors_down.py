#!/usr/bin/python
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)

pins = [4, 17, 10, 9, 6, 13, 12, 16]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.HIGH)
GPIO.output(pins, GPIO.LOW)
