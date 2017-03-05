#!/usr/bin/python
import RPi.GPIO as GPIO
import time

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

# on
pins = [25]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)

time.sleep(1)

# off
pins = [25]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.HIGH)
