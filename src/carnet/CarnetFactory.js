class CarnetFactory {

    static createCarnet(json) {
        let carnets = [];
        json.forEach((element) => {
            if (element.role == "student") {
                let student = new Carnet("/public/Images/maicol.png", element.name, element.user, element.role, element.identification, element.currentProgram, "", element.identification)
                carnets.push(student)
            }
            if (element.role == "employee") {
                let employee = new Carnet("/public/Images/maicol.png", element.name, element.user, element.role, element.identification, element.department, element.position, element.identification)
                carnets.push(employee)
            }
            if (element.role == "graduated") {
                let graduated = new Carnet("/public/Images/maicol.png", element.name, element.user, element.role, element.identification, element.finishedProgram, "", element.identification)
                carnets.push(graduated)
            }
        });
        return carnets;
    }
}


