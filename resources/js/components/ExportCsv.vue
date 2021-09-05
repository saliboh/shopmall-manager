<template>
  <div id="app">
    <div class="container">
        <div class="col-md-6">
          <h3>Vue Js Export as CSV Example - CodeCheef</h3>
          <download-csv
              :data = "json_data">
              Download Data
          </download-csv>
        </div>
    </div>
  </div>
</template>
