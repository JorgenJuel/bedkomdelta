import cytoscape from 'cytoscape';
import axios from 'axios';

export default {
  finalize() {
    /*;

    let cy = cytoscape({
      container,

      layout: {
        name: 'grid',
        rows: 1,
      },
    });

    setTimeout(() => {
      cy.add
    });*/

    console.log(cytoscape);

    let data = new FormData();
    data.append('action', 'subjects');
    let url = 'http://bedkom.test/wp-admin/admin-ajax.php';


    let container = document.getElementById('fagvelgeren');

    axios.post(url, data).then(response => {
      console.log("Setting up");
      cytoscape({
        container,
        elements: response.data,
        style: [
          {
            selector: 'node',
            style: {
              'background-color': '#666',
              'label': 'data(fagkode)',
            },
          },
          {
            selector: 'edge',
            style: {
              'width': 3,
              'line-color': '#ccc',
              'target-arrow-color': '#ccc',
              'target-arrow-shape': 'triangle',
            },
          },
        ],
        options: {
          name: 'random',
          padding: 30,
          fit: true,
        },
      })
    });
  },

  init() {
    console.log("Finish");
  },
};