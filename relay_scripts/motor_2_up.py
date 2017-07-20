#!/usr/bin/python
import settings
import motors_stop

# up
pins = [11, 5]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
