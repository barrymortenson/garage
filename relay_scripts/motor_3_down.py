#!/usr/bin/python
import settings
import motors_stop

# down
pins = [6, 13]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
