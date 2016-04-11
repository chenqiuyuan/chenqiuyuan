# -*- coding: utf-8 -*-
import threading
import time
import os
def xx():
    pass

def pause():
    for i in range(233):
        print i
        time.sleep(1)
        print threading.current_thread().name

def cancel():
    pass

print threading.current_thread().name
t = threading.Thread(target=pause,name='thread-1')
t.start()


t = threading.Thread(target=pause,name='thread-2')
t.start()
