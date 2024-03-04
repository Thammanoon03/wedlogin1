q = 2
a = 3
print('e',q+a)

for g in range(1, 9):
    print(g)

for d in range(1, 6):
    double = d * 2
    print(double)

for h in range(1, 5):
    if h % 3 == 0:
        continue
    print(h)

for h in range(1, 5):
    if h % 3 == 0:
        break
    print(h)

def box_area(width, length, height):
    if width < 0 or length < 0 or height < 0:
        return 0
    area = width * length * height
    return area

b1 = box_area(3, 4, 5)
print(b1)