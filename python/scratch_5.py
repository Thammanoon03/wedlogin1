import math as m

a = float(input('a :'))
b = float(input('b :'))
c = float(input('c :'))
x1 = (-b + m.sqrt(b**2-4*a*c))/(2*a)
x2 = (-b - m.sqrt(b**2-4*a*c))/(2*a)
print('Test 1'+str(x1))
print('Test 2'+str(x2))