#!/usr/bin/python
import RPi.GPIO as GPIO

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

# stop all
pins = [4, 17, 27, 22, 10, 9, 11, 5, 6, 13, 19, 26, 12, 16, 20, 21]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.HIGH)

# up
pins = [27, 22, 11, 5, 19, 26, 20, 21]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
