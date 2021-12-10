<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Fetch API</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
</head>
<body>
  <h1 class="bg-dark text-white text-center">
    <div class="container pt-4 pb-4">
      Fetch API
    </div>
  </h1>
  <div class="container mt-4 mb-4">
      <h2 class="text-center mb-4">Fetch without parameters</h2>
      <div id="demo-without-params" class="row h2"></div>
  </div>
  <hr />
  <div class="container mt-4 mb-4">
    <h2 class="text-center mb-4">Fetch (GET) with parameters</h2>
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

    fetch('{{ route("fetch-cities-without-params") }}')
      .then(response => {
        return response.json();
      })
      .then(response => {
        if (response.status === 0) {
          demoWithoutParams.textContent = response.message;
        } else if (response.status === 1) {
          return response.cities;
        } else {
          demoWithoutParams.textContent = 'Something went wrong!';
        }
      }).
      then(response => {
        demoWithoutParams.innerHTML = '';
        for (let i = 0; i < response.length; i++) {
          demoWithoutParams.innerHTML += `<div class='col-md-3 col-sm-6'>${response[i].name}</div>`;
        }
      })
      .catch(exception => {
        demoWithoutParams.innerHTML = '<div class="col-12 text-center text-center display-4">Exception</div>';
      });
  </script>

  <script>

    // var url = new URL('https://sl.se');
    // var params = {lat:35.696233, long:139.570431} // or:
    // var params = [['lat', '35.696233'], ['long', '139.570431']]
    // url.search = new URLSearchParams(params).toString();

    const getDemo = document.getElementById('demo-get-with-params');
    let url = new URL('{{ route("fetch-cities-with-params-get") }}'),
        params = {
          'city': 1,
          'name': 'Younes ERRAJI'
        };

    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]))

    fetch(url)
      .then(response => {
        return response.json();
      })
      .then(response => {
        getDemo.innerHTML = response.name + ' | ' + response.city.name;
      })
      .catch(exception => {
        demoWithoutParams.innerHTML = '<div class="col-12 text-center text-center display-4">Exception</div>';
      });
  </script>

  <script>

    const demoWithParams = document.querySelector('#demo-with-params');

    async function postData(route) {

      const formData = new FormData(document.forms[0]);
      console.log([...formData]);

      const response = await fetch(route, {
        method: 'POST',
        // cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
        // mode: 'cors', // no-cors, *cors, same-origin
        // redirect: 'follow', // manual, *follow, error
        // referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        headers: {
          "Accept": "application/json",
          "X-Requested-With": "XMLHttpRequest",
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(
            [...formData]
            // {
            //     city: 1,
            //     name: 'Younes'
            // }
        )
      });
      return response.json();
    }

    document.forms[0].onsubmit = function (e) {
      e.preventDefault();
      postData('{{ route('fetch-cities-with-params') }}')
        .then(response => {
          demoWithParams.innerHTML = response.name;
          console.log(response);
        });
    }


  </script>
</body>
</html>
