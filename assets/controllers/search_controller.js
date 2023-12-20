// controllers/search_controller.js
import { Controller } from "@hotwired/stimulus"

export default class extends Controller {
    static targets = [ "query", "errorMessage", "results" ]
    // …

    connect() {
        // this.targets;
         this.targets = 'sdsd'; // data-controller hello لتلوين خلفية الديف الذي يملك ال

    }
}
