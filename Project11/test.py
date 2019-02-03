import sys
import matplotlib.pyplot as plt

values = sys.argv[1]
empid = sys.argv[2]

values = list(values.split(","))
for i in range(0,6):
    values[i] = int(values[i])
days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']
plt.plot(days,values,color='blue',lw=2,marker='o')
plt.savefig("results/"+empid+".png")
