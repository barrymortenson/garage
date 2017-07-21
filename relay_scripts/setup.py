#!/usr/bin/python
import RPi.GPIO as GPIO
import settings

# set all gpio to off
pins = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.HIGH)

print "all relays off"
