#!/usr/bin/python
import RPi.GPIO as GPIO
import settings
import time

# on
pins = [7]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)

time.sleep(0.1)

# off
pins = [7]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.HIGH)


file = open("testfile.txt","w")

file.write("Hello World")
file.write("This is our new text file")
file.write("and this is another line.")
file.write("Why? Because we can.")

file.close()

print "garage door toggled"
