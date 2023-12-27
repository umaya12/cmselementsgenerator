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



    initialize() {
        this.boundHandleMyEvent = this.handleMyEvent.bind(this);
    }


    connect() {


        document.addEventListener("myEvent", this.boundHandleMyEvent);


        this.element.textContent = 'Ohaaaaaaaaaaa Stimulus! Edit me in assets/controllers/hello_controller.js';
    }

    findFoo() {
        console.log("Hello");
    }

    handleMyEvent(event) {
        console.log(event);
        this.mySpanTarget; // Manipulate the span. No problem.
    }


}