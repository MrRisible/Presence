from datetime import datetime
now = datetime.now()
dtString = now.strftime("%I:%M:%S %d/%m/%Y ")
dstring = now.strftime("%d/%m/%Y")
tstring = now.strftime("%I:%M:%S: %p")

print(dtString)
print(dstring)
print(tstring)
