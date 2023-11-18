// En tu archivo de prueba (por ejemplo, example.test.js)
import { expect } from 'chai'
import { assert } from 'chai'
import CarnetsFactory from '../../resources/js/CarnetsFactory.js';
import Carnet from "../../resources/js/Carnet.js";

//const expect = require('expect')
//const expect = chai.expect
describe('CarnetsFactory', () => {

    it('should create a carnet for a student with all required fields', () => {
        const json = [
            {
                role: "Estudiante",
                name: "Sara Valentina Cuy Ramírez",
                identification: "1005720028",
                user: "2420181016",
                currentProgram: "Ingeniería electrónica"
            }
        ];

        const expectedCarnet = new Carnet(
            "Sara Valentina Cuy Ramírez",
            "2420181016",
            "Estudiante",
            "1005720028",
            "Ingeniería electrónica",
            "",
            "#003D7C"
        );

        const result = CarnetsFactory.createCarnet(json);

        expect(result).to.eql([expectedCarnet]);
    });
    it('should create a carnet for an employee with all required fields', () => {
        // Given
        const json = [
            {
                role: "Funcionario",
                name: "nombre",
                identification: "1005720028",
                user: "2420181016",
                department: "el departamento al que peretenece",
                position: "programador jr"
            }
        ];

        // When
        const result = CarnetsFactory.createCarnet(json);

        // Then
        assert.equal(result.length, 1);
        assert.equal(result[0].name, "nombre");
        assert.equal(result[0].user, "2420181016");
        assert.equal(result[0].role, "Funcionario");
        assert.equal(result[0].identification, "1005720028");
        assert.equal(result[0].primaryInfo, "el departamento al que peretenece");
        assert.equal(result[0].secondaryInfo, "programador jr");
        assert.equal(result[0].color, "#FF5F2C");
        assert.equal(result[0].qrCode, undefined);
        assert.equal(result[0].image, "https://siga.unibague.edu.co/sgacampus/images/dynamic/foto/1/1005720028/1005720028.jpg");
    });
    it('should create a carnet for a graduate with all required fields', () => {
        // Given
        const json = [
            {
                role: "Graduado",
                name: "Sara Valentina Cuy",
                identification: "2420181016",
                user: "user",
                finishedProgram: "ingenieria electronica"
            }
        ];

        // When
        const result = CarnetsFactory.createCarnet(json);

        // Then
        assert.equal(result.length, 1);
        assert.equal(result[0].name, "sara valentina cuy");
        assert.equal(result[0].user, "user");
        assert.equal(result[0].role, "Egresado");
        assert.equal(result[0].identification, "2420181016");
        assert.equal(result[0].primaryInfo, "ingenieria electronica");
        assert.equal(result[0].secondaryInfo, "");
        assert.equal(result[0].color, "#FFCC00");
        assert.equal(result[0].qrCode, undefined);
        assert.equal(result[0].image, "https://siga.unibague.edu.co/sgacampus/images/dynamic/foto/1/2420181016/2420181016.jpg");
    });
    it('should create a carnet for a student with no secondary info', () => {
        // Given
        const json = [
            {
                role: "Estudiante",
                name: "Sara Valentina Cuy Ramírez",
                identification: "1005720028",
                user: "2420181016",
                currentProgram: "Ingeniería electrónica"
            }
        ];

        // When
        const result = CarnetsFactory.createCarnet(json);

        // Then
        assert.equal(result.length, 1);
        assert.equal(result[0].name, "sara valentina cuy ramírez");
        assert.equal(result[0].user, "2420181016");
        assert.equal(result[0].role, "Estudiante");
        assert.equal(result[0].identification, "1005720028");
        assert.equal(result[0].primaryInfo, "ingeniería electrónica");
        assert.equal(result[0].secondaryInfo, "");
        assert.equal(result[0].color, "#003D7C");
        assert.equal(result[0].qrCode, undefined);
        assert.equal(result[0].image, "https://siga.unibague.edu.co/sgacampus/images/dynamic/foto/1/1005720028/1005720028.jpg");
    });
    it('should not create a carnet for an employee with no position', () => {
        // Given
        const json = [
            {
                role: "Funcionario",
                name: "nombre",
                identification: "1005720028",
                user: "2420181016",
                department: "el departamento al que peretenece"
            }
        ];

        // When
        const result = CarnetsFactory.createCarnet(json);

        // Then
        assert.equal(result.length, 0);
    });

    it('should not create a carnet for an empty JSON array', () => {
        // Given
        const json = [];

        // When
        const result = CarnetsFactory.createCarnet(json);

        // Then
        assert.equal(result.length, 0);
    });
    it('should create a carnet for a graduate with no secondary info', () => {
        // Given
        const json = [
            {
                role: "Graduado",
                name: "Sara Valentina Cuy",
                identification: "2420181016",
                user: "user",
                finishedProgram: "ingenieria electronica"
            }
        ];

        // When
        const result = CarnetsFactory.createCarnet(json);

        // Then
        assert.equal(result.length, 1);
        assert.equal(result[0].name, "sara valentina cuy");
        assert.equal(result[0].user, "user");
        assert.equal(result[0].role, "Egresado");
        assert.equal(result[0].identification, "2420181016");
        assert.equal(result[0].primaryInfo, "ingenieria electronica");
        assert.equal(result[0].secondaryInfo, "");
        assert.equal(result[0].color, "#FFCC00");
        assert.equal(result[0].qrCode, undefined);
        assert.equal(result[0].image, "https://siga.unibague.edu.co/sgacampus/images/dynamic/foto/1/2420181016/2420181016.jpg");
    });
    it('should create a carnet for multiple roles in a single JSON object', () => {
        // Given
        const json = [
            {
                role: "Estudiante",
                name: "Sara Valentina Cuy Ramírez",
                identification: "1005720028",
                user: "2420181016",
                currentProgram: "Ingeniería electrónica"
            },
            {
                role: "Funcionario",
                name: "nombre",
                identification: "1005720028",
                user: "2420181016",
                department: "el departamento al que peretenece",
                position: "programador jr"
            },
            {
                role: "Graduado",
                name: "Sara Valentina Cuy",
                identification: "2420181016",
                user: "user",
                finishedProgram: "ingenieria electronica"
            }
        ];

        // When
        const result = CarnetsFactory.createCarnet(json);

        // Then
        assert.equal(result.length, 3);

        assert.equal(result[0].name, "sara valentina cuy ramírez");
        assert.equal(result[0].user, "2420181016");
        assert.equal(result[0].role, "Estudiante");
        assert.equal(result[0].identification, "1005720028");
        assert.equal(result[0].primaryInfo, "ingeniería electrónica");
        assert.equal(result[0].secondaryInfo, "");
        assert.equal(result[0].color, "#003D7C");
        assert.equal(result[0].qrCode, undefined);
        assert.equal(result[0].image, "https://siga.unibague.edu.co/sgacampus/images/dynamic/foto/1/1005720028/1005720028.jpg");

        assert.equal(result[1].name, "nombre");
        assert.equal(result[1].user, "2420181016");
        assert.equal(result[1].role, "Funcionario");
        assert.equal(result[1].identification, "1005720028");
        assert.equal(result[1].primaryInfo, "el departamento al que peretenece");
        assert.equal(result[1].secondaryInfo, "programador jr");
        assert.equal(result[1].color, "#FF5F2C");
        assert.equal(result[1].qrCode, undefined);
        assert.equal(result[1].image, "https://siga.unibague.edu.co/sgacampus/images/dynamic/foto/1/1005720028/1005720028.jpg");

        assert.equal(result[2].name, "sara valentina cuy");
        assert.equal(result[2].user, "user");
        assert.equal(result[2].role, "Egresado");
        assert.equal(result[2].identification, "2420181016");
        assert.equal(result[2].primaryInfo, "ingenieria electronica");
        assert.equal(result[2].secondaryInfo, "");
        assert.equal(result[2].color, "#FFCC00");
        assert.equal(result[2].qrCode, undefined);
        assert.equal(result[2].image, "https://siga.unibague.edu.co/sgacampus/images/dynamic/foto/1/2420181016/2420181016.jpg");
    });
});
