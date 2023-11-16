import Carnet from "../js/Carnet.js";
class CarnetsFactory {
    static  createCarnet(json) {

        let carnets = [];
         json.forEach((element) => {
            let newRole = null
            try {
                if (element.role === "Estudiante") {
                    newRole = new Carnet(element.name, element.user, "Estudiante", element.identification, element.currentProgram, "", "#003D7C")
                }
                if (element.role === "Funcionario") {
                    newRole = new Carnet(element.name, element.user, "Funcionario", element.identification, element.department, element.position, "#FF5F2C")
                }
                if (element.role === "Graduado") {
                    newRole = new Carnet(element.name, element.user, "Egresado", element.identification, element.finishedProgram, "", "#FFCC00")
                }
                if (newRole) {
                    carnets.push(newRole)
                }
            } catch (error) {
                console.log('Error creando carnet', error, element)
            }


        });
        return carnets;
    }
}
 export default CarnetsFactory;

