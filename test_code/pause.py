import time
import threading
def pause():
    for i in range(233):
        print i
        time.sleep(1)
        print threading.current_thread().name