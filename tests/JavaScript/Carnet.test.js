import { expect } from 'chai'
import { assert } from 'chai'

import Carnet from "../../resources/js/Carnet.js";


describe('CarnetsFactory', () => {
    it('should set all attributes correctly when creating a new instance with valid arguments', () => {
        // Arrange
        const name = 'John Doe';
        const user = 'johndoe';
        const role = 'student';
        const identification = '1234567890';
        const primaryInfo = 'info1';
        const secondaryInfo = 'info2';
        const color = 'blue';
        const qrCode = 'qrcode';

        // Act
        const carnet = new Carnet(name, user, role, identification, primaryInfo, secondaryInfo, color, qrCode);

        // Assert
        assert.strictEqual(carnet.name, name.toLowerCase());
        assert.strictEqual(carnet.user, user);
        assert.strictEqual(carnet.role, role);
        assert.strictEqual(carnet.identification, identification);
        assert.strictEqual(carnet.primaryInfo, primaryInfo.toLowerCase());
        assert.strictEqual(carnet.secondaryInfo, secondaryInfo.toLowerCase());
        assert.strictEqual(carnet.color, color);
        assert.strictEqual(carnet.qrCode, qrCode);
    });
    it('should return a valid URL for a given identification number when calling the getImage method', () => {
        // Arrange
        const name = 'John Doe';
        const user = 'johndoe';
        const role = 'student';
        const identification = '1234567890';
        const primaryInfo = 'info1';
        const secondaryInfo = 'info2';
        const color = 'blue';
        const qrCode = 'qrcode';
        const expectedUrl = `https://siga.unibague.edu.co/sgacampus/images/dynamic/foto/1/${identification}/${identification}.jpg`;

        // Act
        const carnet = new Carnet(name, user, role, identification, primaryInfo, secondaryInfo, color, qrCode);
        const imageUrl = carnet.getImage();

        // Assert
        assert.strictEqual(imageUrl, expectedUrl);
    });
    it('should update the name attribute correctly when changing it', () => {
        // Arrange
        const name = 'John Doe';
        const user = 'johndoe';
        const role = 'student';
        const identification = '1234567890';
        const primaryInfo = 'info1';
        const secondaryInfo = 'info2';
        const color = 'blue';
        const qrCode = 'qrcode';
        const newName = 'Jane Smith';

        // Act
        const carnet = new Carnet(name, user, role, identification, primaryInfo, secondaryInfo, color, qrCode);
        carnet.name = newName;

        // Assert
        assert.strictEqual(carnet.name, newName.toLowerCase());
    });
    it('should update the primaryInfo attribute correctly when changing it', () => {
        // Arrange
        const name = 'John Doe';
        const user = 'johndoe';
        const role = 'student';
        const identification = '1234567890';
        const primaryInfo = 'info1';
        const secondaryInfo = 'info2';
        const color = 'blue';
        const qrCode = 'qrcode';
        const newPrimaryInfo = 'new info1';

        // Act
        const carnet = new Carnet(name, user, role, identification, primaryInfo, secondaryInfo, color, qrCode);
        carnet.primaryInfo = newPrimaryInfo;

        // Assert
        assert.strictEqual(carnet.primaryInfo, newPrimaryInfo.toLowerCase());
    });
    it('should update the primaryInfo attribute correctly when changing it', () => {
        // Arrange
        const name = 'John Doe';
        const user = 'johndoe';
        const role = 'student';
        const identification = '1234567890';
        const primaryInfo = 'info1';
        const secondaryInfo = 'info2';
        const color = 'blue';
        const qrCode = 'qrcode';
        const newPrimaryInfo = 'new info1';

        // Act
        const carnet = new Carnet(name, user, role, identification, primaryInfo, secondaryInfo, color, qrCode);
        carnet.primaryInfo = newPrimaryInfo;

        // Assert
        assert.strictEqual(carnet.primaryInfo, newPrimaryInfo.toLowerCase());
    });
    it('should update the color attribute correctly when changing it', () => {
        // Arrange
        const name = 'John Doe';
        const user = 'johndoe';
        const role = 'student';
        const identification = '1234567890';
        const primaryInfo = 'info1';
        const secondaryInfo = 'info2';
        const color = 'blue';
        const qrCode = 'qrcode';
        const newColor = 'red';

        // Act
        const carnet = new Carnet(name, user, role, identification, primaryInfo, secondaryInfo, color, qrCode);
        carnet.color = newColor;

        // Assert
        assert.strictEqual(carnet.color, newColor);
    });
    it('should raise an error when creating a new instance with invalid arguments', () => {
        // Arrange
        const name = 'John Doe';
        const user = 'johndoe';
        const role = 'student';
        const identification = '1234567890';
        const primaryInfo = 'info1';
        const secondaryInfo = 'info2';
        const color = 'blue';
        const qrCode = 'qrcode';

        // Act and Assert
        assert.throws(() => new Carnet(name, user, role, identification, primaryInfo, secondaryInfo, color), Error);
    });
    it('should raise an error when creating a new instance with an empty name', () => {
        // Arrange
        const name = '';
        const user = 'johndoe';
        const role = 'student';
        const identification = '1234567890';
        const primaryInfo = 'info1';
        const secondaryInfo = 'info2';
        const color = 'blue';
        const qrCode = 'qrcode';

        // Act and Assert
        assert.throws(() => new Carnet(name, user, role, identification, primaryInfo, secondaryInfo, color, qrCode), Error);
    });
});


