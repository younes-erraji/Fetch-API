<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>XMLHttpRequest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
  </head>

  <body>
    <h1 class="bg-dark text-white text-center">
      <div class="container pt-4 pb-4">
        XMLHttpRequest
      </div>
    </h1>
    <div class="container mt-4 mb-4">
      <h2 class="text-center mb-4">(GET) without parameters</h2>
      <div id="demo-without-params" class="row h2"></div>
    </div>
    <hr />
    <div class="container mt-4 mb-4">
      <h2 class="text-center mb-4">(GET) with parameters</h2>
      <div id="demo-get-with-params" class="h2 mt-3 mb-3 text-center"></div>
    </div>
    <hr />
    <div class="container mt-4 mb-4">
      <h2 class="text-center mb-4">Fetch with parameters</h2>
      <form method="POST">
        <input type="hidden" name="city" value="1" />
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" />
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" />
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="male" name="gender" value="Male" />
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="female" name="gender" value="Female" />
          <label class="form-check-label" for="female">Female</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <div id="demo-with-params" class="h2 mt-3 mb-3 text-center"></div>
    </div>
    <script>
      const demoWithoutParams = document.querySelector('#demo-without-params');
    const xhr = new XMLHttpRequest();

    xhr.open('GET', '{{ route("xhr-cities-without-params") }}', true);
    xhr.onreadystatechange = function () {

      if(xhr.readyState === XMLHttpRequest.DONE) {
        var status = xhr.status;
        if (status === 0 || (status >= 200 && status < 400)) {
          const response = JSON.parse(xhr.responseText);
          demoWithoutParams.innerHTML = '';
          for (let i = 0; i < response.cities.length; i++) {
            demoWithoutParams.innerHTML += `<div class='col-md-3 col-sm-6'>${response.cities[i].name}</div>`;
          }
        } else {
          demoWithoutParams.textContent = 'Something went wrong!';
        }
      }
    };
    xhr.send();

    </script>

    <script>
      const getDemo = document.getElementById('demo-get-with-params');
    let url = new URL('{{ route("xhr-cities-with-params-get") }}'),
        params = {
          'city': 2,
          'name': 'Younes ERRAJI'
        };

    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]))

    const xhrWithParams = new XMLHttpRequest();

    xhrWithParams.open('GET', url, true);
    xhrWithParams.onreadystatechange = function () {

      if(xhrWithParams.readyState === XMLHttpRequest.DONE) {
        var status = xhrWithParams.status;
        if (status === 0 || (status >= 200 && status < 400)) {
          const response = JSON.parse(xhrWithParams.responseText);
          getDemo.innerHTML = response.name + ' | ' + response.city.name;
        } else {
          demoWithoutParams.innerHTML = '<div class="col-12 text-center text-center display-4">Exception</div>';
        }
      }
    };
    xhrWithParams.send();

    </script>

    <script>
      const demoWithParams = document.querySelector('#demo-with-params');

    function postData(route) {

      const xhrWithParamsPOST = new XMLHttpRequest();

      xhrWithParamsPOST.open('POST', route, true);
      xhrWithParamsPOST.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
      xhrWithParamsPOST.onreadystatechange = function () {

        if (xhrWithParamsPOST.readyState === XMLHttpRequest.DONE) {
          var status = xhrWithParamsPOST.status;
          if (status === 0 || (status >= 200 && status < 400)) {
            const response = JSON.parse(xhrWithParamsPOST.responseText);
            console.log(response);
          } else {
            demoWithParams.innerHTML = '<div class="col-12 text-center text-center display-4">Exception</div>';
          }
        }
      };
      xhrWithParamsPOST.send({
        'city': 4,
        'name': 'Younes ERRAJI'
      });

    }

    document.forms[0].onsubmit = function (e) {
      e.preventDefault();
      postData('{{ route('xhr-cities-with-params') }}');
    }
    </script>
  </body>

</html>
