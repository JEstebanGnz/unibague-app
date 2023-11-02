class Carnet {
    constructor( name, user, role, identification, primaryInfo, secondaryInfo, color, qrCode) {
        this.name= name.toLowerCase();
        this.user= user;
        this.role= role;
        this.identification = identification;
        this.primaryInfo = primaryInfo.toLowerCase();
        this.secondaryInfo = secondaryInfo.toLowerCase();
        this.color = color;
        this.qrCode = qrCode;
        this.image = this.getImage();
    }
    getImage (){
        return `https://siga.unibague.edu.co/sgacampus/images/dynamic/foto/1/${this.identification}/${this.identification}.jpg`
    }
}

export default Carnet;
