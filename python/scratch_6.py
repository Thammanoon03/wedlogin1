def box_area(width, length, height):
    if width < 0 or length < 0 or height < 0:
        return 0
    area = width * length * height
    return area

b1 = box_area(4,7,8)
print(b1)