public class Digimon {
    private String nombre;
    private String tipo;   // planta, animal, virus, vacuna, elemental
    private int ataque;
    private int defensa;

    public Digimon(String nombre, String tipo, int ataque, int defensa) {
        this.nombre = nombre;
        this.tipo = tipo;
        this.ataque = ataque;
        this.defensa = defensa;
    }

    // Getters
    public String getNombre() {
        return this.nombre;
    }

    public String getTipo() {
        return this.tipo;
    }

    public int getAtaque() {
        return this.ataque;
    }

    public int getDefensa() {
        return this.defensa;
    }

    // Setter con validación: no acepta ataques negativos.
    // Devuelve true si cambió el valor, false si lo rechazó.
    public boolean setAtaque(int ataque) {
        if (ataque < 0) {
            return false;
        }
        this.ataque = ataque;
        return true;
    }

    public String saludar() {
        return "Soy " + this.nombre + ", tipo " + this.tipo + ".";
    }

    public int poderTotal() {
        return this.ataque + this.defensa;
    }

    public String combatir(Digimon enemigo) {
        if (this.poderTotal() > enemigo.poderTotal()) {
            return this.nombre + " vence a " + enemigo.getNombre() + "!";
        } else if (this.poderTotal() < enemigo.poderTotal()) {
            return this.nombre + " pierde contra " + enemigo.getNombre() + ".";
        }
        return this.nombre + " y " + enemigo.getNombre() + " empatan.";
    }
}