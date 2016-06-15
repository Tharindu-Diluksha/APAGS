#!/usr/bin/python
import subprocess
import sys

output = subprocess.Popen(["C:/Python27/python.exe", sys.argv[1]], stdout=subprocess.PIPE).communicate()[0]
print(sys.argv)
print output
f = open('C:/APAGS/outputfile.txt', 'w')
f.write(output)
f.close()
