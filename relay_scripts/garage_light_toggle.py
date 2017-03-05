#!/usr/bin/python
import RPi.GPIO as GPIO
import time

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

# on
pins = [8]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)

time.sleep(0.5)

# off
pins = [8]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.HIGH)
