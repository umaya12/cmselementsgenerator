import { Controller } from '@hotwired/stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {





    //Die connect-Methode wird aufgerufen, sobald der Controller mit einem Element im DOM verknüpft wird
    connect() {
        // this.targets;
        console.log(this.identifier + " this.identifier "); // اظهار اسم الكونترولر
        this.element.style.backgroundColor = 'yellow'; // data-controller hello لتلوين خلفية الديف الذي يملك ال

    }

//Die initialize-Methode wird einmal aufgerufen, wenn der Controller instanziiert wird.
    initialize() {
         this.element.style.backgroundColor = 'yellow'; // data-controller hello لتلوين خلفية الديف الذي يملك ال
    }
 // Die disconnect-Methode wird aufgerufen, wenn der Controller vom DOM-Element getrennt wird.
    disconnect() {
        console.log('Controller getrennt');
    }




}
