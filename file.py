import os
d=os.listdir(".\\use_text")
f=open("var/config.txt","w")
f.write(str(len(d))+"\n"+str(20))
f.close()
