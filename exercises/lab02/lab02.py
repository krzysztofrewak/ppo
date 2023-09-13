import random


class Student:
    name = None
    surname = None

    def get_full_name(self):
        return self.name + " " + self.surname


def get_random_name():
    names = ["John", "Jim", "Jack", "George", "Kevin"]
    return random.choice(names)


students = []

student = Student()
student.name = get_random_name()
student.surname = "Doe"
students.append(student)

for student in students:
	print(student.get_full_name())
