#!/usr/bin/python
import settings
import motors_stop

# down
pins = [12, 16]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
