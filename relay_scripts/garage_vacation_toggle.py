#!/usr/bin/python
import settings
import time

# on
pins = [25]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)

time.sleep(0.1)

# off
pins = [25]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.HIGH)
