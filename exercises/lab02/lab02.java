import java.util.ArrayList;
import java.util.Random;

class Student {
	public String name;
	public String surname;

	public String getFullName() {
		return this.name + " " + this.surname;
	}
}

public class lab02 {
	public static void main(String[] args) {
		ArrayList<Student> students = new ArrayList<Student>();

		Student student = new Student();
		student.name = getRandomName();
		student.surname = "Doe";
		students.add(student);

		for(Student s : students) {
			System.out.println(student.getFullName());
		}
	}

	protected static String getRandomName() {
		String[] names = {"John", "Jim", "Jack", "George", "Kevin"};
		return names[new Random().nextInt(names.length)];
	}
}
