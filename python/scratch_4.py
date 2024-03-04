a = int(input('Enter score :'))
d = int(input('Enter score :'))
total = a+d
print('=',total)

if total >= 80:
    print('Grade A')
elif total >= 70:
    print('Grade B')
elif total >= 60:
    print('Grade D')
elif total >= 50:
    print('Grade C')
elif total <= 49:
    print('Grade F')