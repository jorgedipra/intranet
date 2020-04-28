class Alerts {
    constructor() {
        this.title = 'Titulo';
        this.contenido = 'contenido';
        this.type = 'type';
    }

    static windows(type, title, contenido) {
        this.title = title;
        this.contenido = contenido;
        this.type = type;
        var txt = document.getElementById("alerts")
        txt.innerHTML += `
        <div class="alert ${this.type} alert-dismissible show _alerts" role="alert">
            <strong style="text-transform:uppercase">${this.title} |</strong> ${this.contenido}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        `;
    }
}
new Alerts();