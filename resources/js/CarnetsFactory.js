import Carnet from "@/Carnet.js";
class CarnetsFactory {

    static createCarnet(json) {
        let carnets = [];
        json.forEach((element) => {
            if (element.role == "student") {
                let student = new Carnet("../../public/Images/maicol.png", element.name, element.user, "Estudiante", element.identification, element.currentProgram, "", "#003D7C" )
                carnets.push(student)
            }
            if (element.role == "employee") {
                let employee = new Carnet("../../public/Images/maicol.png", element.name, element.user, "Funcionario", element.identification, element.department, element.position, "#FF5F2C")
                carnets.push(employee)
            }
            if (element.role == "graduated") {
                let graduated = new Carnet("/public/Images/maicol.png", element.name, element.user, "Egresado", element.identification, element.finishedProgram, "","#FFCC00")
                carnets.push(graduated)
            }
        });
        return carnets;
    }
}
 export default CarnetsFactory;

