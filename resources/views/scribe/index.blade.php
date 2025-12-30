<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Football-App API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://football-app.test";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">
<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">

            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>

    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-competitions">
                                <a href="#endpoints-GETapi-competitions">GET api/competitions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-competitions">
                                <a href="#endpoints-POSTapi-competitions">POST api/competitions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-competitions--id-">
                                <a href="#endpoints-GETapi-competitions--id-">GET api/competitions/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-competitions--id-">
                                <a href="#endpoints-PUTapi-competitions--id-">PUT api/competitions/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-competitions--id-">
                                <a href="#endpoints-DELETEapi-competitions--id-">DELETE api/competitions/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-teams">
                                <a href="#endpoints-GETapi-teams">GET api/teams</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-teams">
                                <a href="#endpoints-POSTapi-teams">POST api/teams</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-teams--id-">
                                <a href="#endpoints-GETapi-teams--id-">GET api/teams/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-teams--id-">
                                <a href="#endpoints-PUTapi-teams--id-">PUT api/teams/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-teams--id-">
                                <a href="#endpoints-DELETEapi-teams--id-">DELETE api/teams/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-teams--team_id--players">
                                <a href="#endpoints-GETapi-teams--team_id--players">GET api/teams/{team_id}/players</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-players">
                                <a href="#endpoints-GETapi-players">GET api/players</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-players">
                                <a href="#endpoints-POSTapi-players">POST api/players</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-players--id-">
                                <a href="#endpoints-GETapi-players--id-">GET api/players/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-players--id-">
                                <a href="#endpoints-PUTapi-players--id-">PUT api/players/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-players--id-">
                                <a href="#endpoints-DELETEapi-players--id-">DELETE api/players/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-football-match-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="football-match-management">
                    <a href="#football-match-management">Football Match Management</a>
                </li>
                                    <ul id="tocify-subheader-football-match-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="football-match-management-GETapi-competitions--competition_id--matches">
                                <a href="#football-match-management-GETapi-competitions--competition_id--matches">Get matches by competition</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="football-match-management-GETapi-teams--team_id--matches">
                                <a href="#football-match-management-GETapi-teams--team_id--matches">Get matches by team</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="football-match-management-GETapi-matches">
                                <a href="#football-match-management-GETapi-matches">Get all football matches</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="football-match-management-POSTapi-matches">
                                <a href="#football-match-management-POSTapi-matches">Create a new football match</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="football-match-management-GETapi-matches--id-">
                                <a href="#football-match-management-GETapi-matches--id-">Get a specific football match</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="football-match-management-PUTapi-matches--id-">
                                <a href="#football-match-management-PUTapi-matches--id-">Update a football match</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="football-match-management-DELETEapi-matches--id-">
                                <a href="#football-match-management-DELETEapi-matches--id-">Delete a football match</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="football-match-management-POSTapi-matches--footballMatch_id--scorers">
                                <a href="#football-match-management-POSTapi-matches--footballMatch_id--scorers">Add a scorer to a match</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="football-match-management-DELETEapi-matches--footballMatch_id--scorers--player_id-">
                                <a href="#football-match-management-DELETEapi-matches--footballMatch_id--scorers--player_id-">Remove a scorer from a match</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: July 5, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://football-app.test</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>



                                <h2 id="endpoints-GETapi-competitions">GET api/competitions</h2>

<p>
</p>



<span id="example-requests-GETapi-competitions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://football-app.test/api/competitions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/competitions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-competitions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;0197dc06-d48f-72b8-94f9-ac4426e2e81c&quot;,
            &quot;name&quot;: &quot;accusantium aut deserunt&quot;,
            &quot;description&quot;: &quot;Optio sunt omnis ut et. Officia nostrum vel qui voluptatem assumenda. Non ab soluta recusandae veniam ea odio iste. Facilis architecto explicabo voluptatem fugit eum.&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;teams&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd894ffb02d1&quot;,
                    &quot;name&quot;: &quot;Blick LLC&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009966?text=sports+voluptas&quot;,
                    &quot;first_color&quot;: &quot;#21f7a6&quot;,
                    &quot;second_color&quot;: &quot;#22abdd&quot;,
                    &quot;year_of_foundation&quot;: 1959,
                    &quot;stadium&quot;: &quot;Daughertyhaven Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd895081f4c2&quot;,
                    &quot;name&quot;: &quot;Effertz PLC&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066ff?text=sports+odit&quot;,
                    &quot;first_color&quot;: &quot;#9ab8d1&quot;,
                    &quot;second_color&quot;: &quot;#39b0a0&quot;,
                    &quot;year_of_foundation&quot;: 1983,
                    &quot;stadium&quot;: &quot;Mohamedport Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd8950fae5b9&quot;,
                    &quot;name&quot;: &quot;Hoeger, Botsford and Emmerich&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eeaa?text=sports+aliquid&quot;,
                    &quot;first_color&quot;: &quot;#de10f0&quot;,
                    &quot;second_color&quot;: &quot;#c2ad85&quot;,
                    &quot;year_of_foundation&quot;: 1904,
                    &quot;stadium&quot;: &quot;Lake Jacintoside Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe0586ace&quot;,
                    &quot;name&quot;: &quot;Roob-Crooks&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aabb?text=sports+eveniet&quot;,
                    &quot;first_color&quot;: &quot;#cc23e9&quot;,
                    &quot;second_color&quot;: &quot;#728357&quot;,
                    &quot;year_of_foundation&quot;: 2021,
                    &quot;stadium&quot;: &quot;Irwinfort Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe086cb55&quot;,
                    &quot;name&quot;: &quot;Marquardt Ltd&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077aa?text=sports+ea&quot;,
                    &quot;first_color&quot;: &quot;#e8a05e&quot;,
                    &quot;second_color&quot;: &quot;#ec907a&quot;,
                    &quot;year_of_foundation&quot;: 2005,
                    &quot;stadium&quot;: &quot;Pollichfort Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe13f297d&quot;,
                    &quot;name&quot;: &quot;Flatley, Altenwerth and Bins&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa11?text=sports+est&quot;,
                    &quot;first_color&quot;: &quot;#273916&quot;,
                    &quot;second_color&quot;: &quot;#15d0ad&quot;,
                    &quot;year_of_foundation&quot;: 1961,
                    &quot;stadium&quot;: &quot;Port Vadaport Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe15eed18&quot;,
                    &quot;name&quot;: &quot;Schimmel, Block and D&#039;Amore&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ddbb?text=sports+at&quot;,
                    &quot;first_color&quot;: &quot;#01b921&quot;,
                    &quot;second_color&quot;: &quot;#7d4047&quot;,
                    &quot;year_of_foundation&quot;: 1900,
                    &quot;stadium&quot;: &quot;East Arnaldofort Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe1ec0509&quot;,
                    &quot;name&quot;: &quot;Schmidt-Jones&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0099dd?text=sports+eius&quot;,
                    &quot;first_color&quot;: &quot;#f85802&quot;,
                    &quot;second_color&quot;: &quot;#8bbd6e&quot;,
                    &quot;year_of_foundation&quot;: 1951,
                    &quot;stadium&quot;: &quot;Port Suzanne Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e7289f18f&quot;,
                    &quot;name&quot;: &quot;Kris-Schmidt&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eecc?text=sports+quos&quot;,
                    &quot;first_color&quot;: &quot;#3b4a0e&quot;,
                    &quot;second_color&quot;: &quot;#e5981e&quot;,
                    &quot;year_of_foundation&quot;: 1946,
                    &quot;stadium&quot;: &quot;Robynview Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e73174ce8&quot;,
                    &quot;name&quot;: &quot;Schoen Inc&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ff55?text=sports+et&quot;,
                    &quot;first_color&quot;: &quot;#2d9cfe&quot;,
                    &quot;second_color&quot;: &quot;#8df426&quot;,
                    &quot;year_of_foundation&quot;: 1960,
                    &quot;stadium&quot;: &quot;Angusburgh Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e73b10df0&quot;,
                    &quot;name&quot;: &quot;Runolfsson, Miller and Kris&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066cc?text=sports+modi&quot;,
                    &quot;first_color&quot;: &quot;#7087e7&quot;,
                    &quot;second_color&quot;: &quot;#8e3431&quot;,
                    &quot;year_of_foundation&quot;: 1902,
                    &quot;stadium&quot;: &quot;Catalinaborough Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065b368d8b&quot;,
                    &quot;name&quot;: &quot;Huel, Schaefer and Heller&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ee00?text=sports+quisquam&quot;,
                    &quot;first_color&quot;: &quot;#bb909f&quot;,
                    &quot;second_color&quot;: &quot;#b37ec1&quot;,
                    &quot;year_of_foundation&quot;: 1988,
                    &quot;stadium&quot;: &quot;Devenmouth Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065b38117c&quot;,
                    &quot;name&quot;: &quot;Fisher-Daugherty&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008822?text=sports+perferendis&quot;,
                    &quot;first_color&quot;: &quot;#bd17c2&quot;,
                    &quot;second_color&quot;: &quot;#3270cb&quot;,
                    &quot;year_of_foundation&quot;: 1905,
                    &quot;stadium&quot;: &quot;Marionbury Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065bd50bba&quot;,
                    &quot;name&quot;: &quot;Auer Inc&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/007733?text=sports+est&quot;,
                    &quot;first_color&quot;: &quot;#c8543a&quot;,
                    &quot;second_color&quot;: &quot;#7d33e3&quot;,
                    &quot;year_of_foundation&quot;: 1931,
                    &quot;stadium&quot;: &quot;Smithhaven Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d48f-72b8-94f9-ac4427144048&quot;,
            &quot;name&quot;: &quot;reiciendis qui aliquid&quot;,
            &quot;description&quot;: &quot;Dolorem alias voluptatem pariatur corrupti. Nesciunt nihil excepturi numquam quibusdam. Perspiciatis et et a neque qui. Eum officiis eum expedita consequuntur quia dolor.&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;teams&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d49b-7118-b930-594a3d779423&quot;,
                    &quot;name&quot;: &quot;White Ltd&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008811?text=sports+animi&quot;,
                    &quot;first_color&quot;: &quot;#b6d5f4&quot;,
                    &quot;second_color&quot;: &quot;#56fab9&quot;,
                    &quot;year_of_foundation&quot;: 1923,
                    &quot;stadium&quot;: &quot;West Garrick Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49b-7118-b930-594a3de22fb5&quot;,
                    &quot;name&quot;: &quot;Greenholt, Steuber and Wintheiser&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/001166?text=sports+vel&quot;,
                    &quot;first_color&quot;: &quot;#8eff30&quot;,
                    &quot;second_color&quot;: &quot;#8918e1&quot;,
                    &quot;year_of_foundation&quot;: 1942,
                    &quot;stadium&quot;: &quot;Port Clairberg Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49b-7118-b930-594a3e7987ff&quot;,
                    &quot;name&quot;: &quot;Block, Harris and Bode&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ccdd?text=sports+dolore&quot;,
                    &quot;first_color&quot;: &quot;#651451&quot;,
                    &quot;second_color&quot;: &quot;#aa888e&quot;,
                    &quot;year_of_foundation&quot;: 1919,
                    &quot;stadium&quot;: &quot;Stantonberg Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49b-7118-b930-594a3e7dcdc5&quot;,
                    &quot;name&quot;: &quot;Schroeder-Green&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008899?text=sports+reiciendis&quot;,
                    &quot;first_color&quot;: &quot;#f61e4f&quot;,
                    &quot;second_color&quot;: &quot;#2556b7&quot;,
                    &quot;year_of_foundation&quot;: 1918,
                    &quot;stadium&quot;: &quot;Lake Wilton Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49c-72f4-931a-ad3f240a41d3&quot;,
                    &quot;name&quot;: &quot;Schoen-Mayert&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066dd?text=sports+ut&quot;,
                    &quot;first_color&quot;: &quot;#9eea10&quot;,
                    &quot;second_color&quot;: &quot;#5d29a2&quot;,
                    &quot;year_of_foundation&quot;: 2013,
                    &quot;stadium&quot;: &quot;Mabelton Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49c-72f4-931a-ad3f243d444d&quot;,
                    &quot;name&quot;: &quot;Hagenes-Farrell&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc11?text=sports+quidem&quot;,
                    &quot;first_color&quot;: &quot;#4db86d&quot;,
                    &quot;second_color&quot;: &quot;#80efd0&quot;,
                    &quot;year_of_foundation&quot;: 1910,
                    &quot;stadium&quot;: &quot;East Curt Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49c-72f4-931a-ad3f24d9e774&quot;,
                    &quot;name&quot;: &quot;Christiansen, Bernier and Stroman&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066bb?text=sports+enim&quot;,
                    &quot;first_color&quot;: &quot;#68b67e&quot;,
                    &quot;second_color&quot;: &quot;#aa58b0&quot;,
                    &quot;year_of_foundation&quot;: 2023,
                    &quot;stadium&quot;: &quot;New Elsa Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49c-72f4-931a-ad3f251dcb17&quot;,
                    &quot;name&quot;: &quot;Yundt-Hammes&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/007788?text=sports+ea&quot;,
                    &quot;first_color&quot;: &quot;#b06d06&quot;,
                    &quot;second_color&quot;: &quot;#9b8994&quot;,
                    &quot;year_of_foundation&quot;: 2013,
                    &quot;stadium&quot;: &quot;Mayertfort Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49d-704b-a924-77f0121f54b8&quot;,
                    &quot;name&quot;: &quot;Veum, Lakin and Bayer&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd77?text=sports+et&quot;,
                    &quot;first_color&quot;: &quot;#af3961&quot;,
                    &quot;second_color&quot;: &quot;#e51992&quot;,
                    &quot;year_of_foundation&quot;: 1929,
                    &quot;stadium&quot;: &quot;Rafaelachester Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49d-704b-a924-77f012cea5b5&quot;,
                    &quot;name&quot;: &quot;Hartmann, Balistreri and Crist&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+sint&quot;,
                    &quot;first_color&quot;: &quot;#214642&quot;,
                    &quot;second_color&quot;: &quot;#3e609e&quot;,
                    &quot;year_of_foundation&quot;: 1952,
                    &quot;stadium&quot;: &quot;Batzton Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49d-704b-a924-77f012e9067f&quot;,
                    &quot;name&quot;: &quot;Beahan, Mitchell and Adams&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004411?text=sports+aliquid&quot;,
                    &quot;first_color&quot;: &quot;#77a692&quot;,
                    &quot;second_color&quot;: &quot;#543a69&quot;,
                    &quot;year_of_foundation&quot;: 1939,
                    &quot;stadium&quot;: &quot;Stanton Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49d-704b-a924-77f013666cfe&quot;,
                    &quot;name&quot;: &quot;Emmerich, Carter and Block&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/005544?text=sports+hic&quot;,
                    &quot;first_color&quot;: &quot;#5a7bb3&quot;,
                    &quot;second_color&quot;: &quot;#23bde4&quot;,
                    &quot;year_of_foundation&quot;: 1972,
                    &quot;stadium&quot;: &quot;Lake Gregoriobury Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49e-70f9-adb5-ed710013113b&quot;,
                    &quot;name&quot;: &quot;Raynor, Kshlerin and Schmidt&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+cupiditate&quot;,
                    &quot;first_color&quot;: &quot;#0289f3&quot;,
                    &quot;second_color&quot;: &quot;#4acd06&quot;,
                    &quot;year_of_foundation&quot;: 1906,
                    &quot;stadium&quot;: &quot;Sengerport Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49e-70f9-adb5-ed71010e7318&quot;,
                    &quot;name&quot;: &quot;Ratke PLC&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbee?text=sports+itaque&quot;,
                    &quot;first_color&quot;: &quot;#784a7a&quot;,
                    &quot;second_color&quot;: &quot;#17ff14&quot;,
                    &quot;year_of_foundation&quot;: 1932,
                    &quot;stadium&quot;: &quot;West Pattiestad Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d49e-70f9-adb5-ed71014b7a30&quot;,
                    &quot;name&quot;: &quot;Schmidt Inc&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088ff?text=sports+quas&quot;,
                    &quot;first_color&quot;: &quot;#05cfa9&quot;,
                    &quot;second_color&quot;: &quot;#d2d82f&quot;,
                    &quot;year_of_foundation&quot;: 1910,
                    &quot;stadium&quot;: &quot;Koeppmouth Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d48f-72b8-94f9-ac442794ba3c&quot;,
            &quot;name&quot;: &quot;id est delectus&quot;,
            &quot;description&quot;: &quot;Ab sunt expedita quia ea. Est quo et est expedita est facilis eligendi qui. Odio reprehenderit voluptatibus quidem.&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;teams&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4a1-7088-be69-ee5354ac9370&quot;,
                    &quot;name&quot;: &quot;Corwin LLC&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/002277?text=sports+commodi&quot;,
                    &quot;first_color&quot;: &quot;#5b8dcc&quot;,
                    &quot;second_color&quot;: &quot;#f0509b&quot;,
                    &quot;year_of_foundation&quot;: 1994,
                    &quot;stadium&quot;: &quot;Port Dorthy Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a1-7088-be69-ee53552f5761&quot;,
                    &quot;name&quot;: &quot;Kub, Marks and O&#039;Keefe&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/002200?text=sports+aspernatur&quot;,
                    &quot;first_color&quot;: &quot;#ca4e93&quot;,
                    &quot;second_color&quot;: &quot;#c42096&quot;,
                    &quot;year_of_foundation&quot;: 1925,
                    &quot;stadium&quot;: &quot;East Marjolaine Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a1-7088-be69-ee535629d4eb&quot;,
                    &quot;name&quot;: &quot;Beatty Group&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088bb?text=sports+numquam&quot;,
                    &quot;first_color&quot;: &quot;#3d123e&quot;,
                    &quot;second_color&quot;: &quot;#1b6918&quot;,
                    &quot;year_of_foundation&quot;: 1987,
                    &quot;stadium&quot;: &quot;Cieloview Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a2-70a5-927e-7ff99e47996c&quot;,
                    &quot;name&quot;: &quot;Koepp, Ruecker and Greenfelder&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006655?text=sports+labore&quot;,
                    &quot;first_color&quot;: &quot;#538570&quot;,
                    &quot;second_color&quot;: &quot;#4d43d7&quot;,
                    &quot;year_of_foundation&quot;: 2002,
                    &quot;stadium&quot;: &quot;Lake Maegan Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a2-70a5-927e-7ff99e584630&quot;,
                    &quot;name&quot;: &quot;O&#039;Keefe, Kreiger and Kessler&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011ee?text=sports+tempora&quot;,
                    &quot;first_color&quot;: &quot;#c2b05e&quot;,
                    &quot;second_color&quot;: &quot;#09511f&quot;,
                    &quot;year_of_foundation&quot;: 1995,
                    &quot;stadium&quot;: &quot;Port Kirstin Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a2-70a5-927e-7ff99f2edea1&quot;,
                    &quot;name&quot;: &quot;Adams LLC&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0000ee?text=sports+enim&quot;,
                    &quot;first_color&quot;: &quot;#3fadd0&quot;,
                    &quot;second_color&quot;: &quot;#468642&quot;,
                    &quot;year_of_foundation&quot;: 1997,
                    &quot;stadium&quot;: &quot;Osbaldoberg Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a3-7249-9e67-75ec170617ae&quot;,
                    &quot;name&quot;: &quot;Koelpin-Rau&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ff44?text=sports+vel&quot;,
                    &quot;first_color&quot;: &quot;#e75c67&quot;,
                    &quot;second_color&quot;: &quot;#6e9593&quot;,
                    &quot;year_of_foundation&quot;: 1943,
                    &quot;stadium&quot;: &quot;East Jamar Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a3-7249-9e67-75ec170f4edd&quot;,
                    &quot;name&quot;: &quot;Morar Group&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb55?text=sports+iste&quot;,
                    &quot;first_color&quot;: &quot;#a6cf6b&quot;,
                    &quot;second_color&quot;: &quot;#c0cbcf&quot;,
                    &quot;year_of_foundation&quot;: 2013,
                    &quot;stadium&quot;: &quot;Schustertown Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a3-7249-9e67-75ec173f092c&quot;,
                    &quot;name&quot;: &quot;Cassin, Schultz and Douglas&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa88?text=sports+eos&quot;,
                    &quot;first_color&quot;: &quot;#88fe39&quot;,
                    &quot;second_color&quot;: &quot;#c199cb&quot;,
                    &quot;year_of_foundation&quot;: 1953,
                    &quot;stadium&quot;: &quot;Yazminberg Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a4-7359-8396-f57328bfc7fc&quot;,
                    &quot;name&quot;: &quot;Dickinson Inc&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbee?text=sports+et&quot;,
                    &quot;first_color&quot;: &quot;#48bc32&quot;,
                    &quot;second_color&quot;: &quot;#55b495&quot;,
                    &quot;year_of_foundation&quot;: 2001,
                    &quot;stadium&quot;: &quot;Lake Dianna Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a4-7359-8396-f5732979bbae&quot;,
                    &quot;name&quot;: &quot;Daugherty Group&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004488?text=sports+incidunt&quot;,
                    &quot;first_color&quot;: &quot;#473d0b&quot;,
                    &quot;second_color&quot;: &quot;#44418c&quot;,
                    &quot;year_of_foundation&quot;: 1967,
                    &quot;stadium&quot;: &quot;Gerlachville Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a4-7359-8396-f5732a119aa9&quot;,
                    &quot;name&quot;: &quot;Stokes Inc&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/000044?text=sports+vel&quot;,
                    &quot;first_color&quot;: &quot;#377589&quot;,
                    &quot;second_color&quot;: &quot;#709148&quot;,
                    &quot;year_of_foundation&quot;: 1923,
                    &quot;stadium&quot;: &quot;South Webster Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a4-7359-8396-f5732a196158&quot;,
                    &quot;name&quot;: &quot;Olson-Bashirian&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066ee?text=sports+vero&quot;,
                    &quot;first_color&quot;: &quot;#7b6611&quot;,
                    &quot;second_color&quot;: &quot;#31f1a0&quot;,
                    &quot;year_of_foundation&quot;: 2021,
                    &quot;stadium&quot;: &quot;Carterside Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a5-7316-9795-4acc42d095da&quot;,
                    &quot;name&quot;: &quot;Terry Ltd&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc33?text=sports+modi&quot;,
                    &quot;first_color&quot;: &quot;#b12c99&quot;,
                    &quot;second_color&quot;: &quot;#66da30&quot;,
                    &quot;year_of_foundation&quot;: 1973,
                    &quot;stadium&quot;: &quot;North Everardo Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a5-7316-9795-4acc430b66f3&quot;,
                    &quot;name&quot;: &quot;Pfannerstill Ltd&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088cc?text=sports+expedita&quot;,
                    &quot;first_color&quot;: &quot;#789791&quot;,
                    &quot;second_color&quot;: &quot;#34a4bd&quot;,
                    &quot;year_of_foundation&quot;: 1938,
                    &quot;stadium&quot;: &quot;Milliefort Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d490-7172-85f3-0bdc88362ec0&quot;,
            &quot;name&quot;: &quot;aut autem beatae&quot;,
            &quot;description&quot;: &quot;Culpa voluptatibus iure facere enim earum mollitia minima. Perferendis ipsum quo eum itaque mollitia natus. Corporis voluptatum earum possimus. Placeat rerum deserunt vel unde aut.&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;teams&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4a8-7284-9497-dd0ff1f45d63&quot;,
                    &quot;name&quot;: &quot;Buckridge LLC&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ddaa?text=sports+magni&quot;,
                    &quot;first_color&quot;: &quot;#1bb411&quot;,
                    &quot;second_color&quot;: &quot;#e67f18&quot;,
                    &quot;year_of_foundation&quot;: 1920,
                    &quot;stadium&quot;: &quot;New Eldridge Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a8-7284-9497-dd0ff2498daa&quot;,
                    &quot;name&quot;: &quot;Auer-Raynor&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/001166?text=sports+unde&quot;,
                    &quot;first_color&quot;: &quot;#dc4053&quot;,
                    &quot;second_color&quot;: &quot;#cd4b42&quot;,
                    &quot;year_of_foundation&quot;: 2016,
                    &quot;stadium&quot;: &quot;Goyetteside Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a9-71ea-aca3-7bdf43dd9b2e&quot;,
                    &quot;name&quot;: &quot;Stoltenberg Inc&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008811?text=sports+rerum&quot;,
                    &quot;first_color&quot;: &quot;#32301b&quot;,
                    &quot;second_color&quot;: &quot;#d488fd&quot;,
                    &quot;year_of_foundation&quot;: 1973,
                    &quot;stadium&quot;: &quot;South Wayne Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a9-71ea-aca3-7bdf44b28bcd&quot;,
                    &quot;name&quot;: &quot;Hessel, Kiehn and Berge&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+quia&quot;,
                    &quot;first_color&quot;: &quot;#f744a6&quot;,
                    &quot;second_color&quot;: &quot;#6f10af&quot;,
                    &quot;year_of_foundation&quot;: 2011,
                    &quot;stadium&quot;: &quot;East Kaleburgh Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4a9-71ea-aca3-7bdf4561cf39&quot;,
                    &quot;name&quot;: &quot;Kuhic, Hansen and Monahan&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088aa?text=sports+blanditiis&quot;,
                    &quot;first_color&quot;: &quot;#c3dd9f&quot;,
                    &quot;second_color&quot;: &quot;#e0b6aa&quot;,
                    &quot;year_of_foundation&quot;: 1957,
                    &quot;stadium&quot;: &quot;Stiedemannshire Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4aa-7307-a54f-da0915859644&quot;,
                    &quot;name&quot;: &quot;Volkman-Gutmann&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/007777?text=sports+magni&quot;,
                    &quot;first_color&quot;: &quot;#fac849&quot;,
                    &quot;second_color&quot;: &quot;#591855&quot;,
                    &quot;year_of_foundation&quot;: 1950,
                    &quot;stadium&quot;: &quot;North Justicebury Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4aa-7307-a54f-da09161bd1c2&quot;,
                    &quot;name&quot;: &quot;Blick and Sons&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/000077?text=sports+nostrum&quot;,
                    &quot;first_color&quot;: &quot;#c8c5b7&quot;,
                    &quot;second_color&quot;: &quot;#e3cbda&quot;,
                    &quot;year_of_foundation&quot;: 1902,
                    &quot;stadium&quot;: &quot;Krisville Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4aa-7307-a54f-da091691880c&quot;,
                    &quot;name&quot;: &quot;Carter-Mante&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbaa?text=sports+odit&quot;,
                    &quot;first_color&quot;: &quot;#489a1a&quot;,
                    &quot;second_color&quot;: &quot;#f996bb&quot;,
                    &quot;year_of_foundation&quot;: 1993,
                    &quot;stadium&quot;: &quot;Elsieland Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ab-7098-8c5c-703bbf9e95eb&quot;,
                    &quot;name&quot;: &quot;Borer-Krajcik&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0099ff?text=sports+aut&quot;,
                    &quot;first_color&quot;: &quot;#9aa03c&quot;,
                    &quot;second_color&quot;: &quot;#0e0c56&quot;,
                    &quot;year_of_foundation&quot;: 1955,
                    &quot;stadium&quot;: &quot;Port Bomouth Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ab-7098-8c5c-703bc0992e87&quot;,
                    &quot;name&quot;: &quot;Swaniawski-Torphy&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb99?text=sports+sapiente&quot;,
                    &quot;first_color&quot;: &quot;#a968f1&quot;,
                    &quot;second_color&quot;: &quot;#0570bc&quot;,
                    &quot;year_of_foundation&quot;: 1947,
                    &quot;stadium&quot;: &quot;Nataliafort Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ab-7098-8c5c-703bc1343dcd&quot;,
                    &quot;name&quot;: &quot;Bruen-Zieme&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/007755?text=sports+qui&quot;,
                    &quot;first_color&quot;: &quot;#7a8a39&quot;,
                    &quot;second_color&quot;: &quot;#a4c34e&quot;,
                    &quot;year_of_foundation&quot;: 2000,
                    &quot;stadium&quot;: &quot;Thielhaven Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ac-718e-acee-f821efebc27a&quot;,
                    &quot;name&quot;: &quot;Schmitt, Klocko and Bahringer&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dddd?text=sports+aut&quot;,
                    &quot;first_color&quot;: &quot;#8167e6&quot;,
                    &quot;second_color&quot;: &quot;#571ad5&quot;,
                    &quot;year_of_foundation&quot;: 1943,
                    &quot;stadium&quot;: &quot;Ruperthaven Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ac-718e-acee-f821f09223ba&quot;,
                    &quot;name&quot;: &quot;Marvin Ltd&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/003388?text=sports+magni&quot;,
                    &quot;first_color&quot;: &quot;#0ac0b9&quot;,
                    &quot;second_color&quot;: &quot;#335ef6&quot;,
                    &quot;year_of_foundation&quot;: 1924,
                    &quot;stadium&quot;: &quot;Roweside Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ac-718e-acee-f821f0af1ce3&quot;,
                    &quot;name&quot;: &quot;Frami-Considine&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+et&quot;,
                    &quot;first_color&quot;: &quot;#c56b5f&quot;,
                    &quot;second_color&quot;: &quot;#186f39&quot;,
                    &quot;year_of_foundation&quot;: 1987,
                    &quot;stadium&quot;: &quot;Angelview Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ac-718e-acee-f821f0ba81a8&quot;,
                    &quot;name&quot;: &quot;Quigley, Watsica and Feest&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006622?text=sports+asperiores&quot;,
                    &quot;first_color&quot;: &quot;#7c5032&quot;,
                    &quot;second_color&quot;: &quot;#e7e85c&quot;,
                    &quot;year_of_foundation&quot;: 1917,
                    &quot;stadium&quot;: &quot;Gorczanyville Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ad-71b7-bde2-e2e8030323b6&quot;,
                    &quot;name&quot;: &quot;O&#039;Connell, Connelly and Senger&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ee44?text=sports+aut&quot;,
                    &quot;first_color&quot;: &quot;#fa6325&quot;,
                    &quot;second_color&quot;: &quot;#96d48d&quot;,
                    &quot;year_of_foundation&quot;: 1917,
                    &quot;stadium&quot;: &quot;Purdyburgh Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ad-71b7-bde2-e2e803ed9962&quot;,
                    &quot;name&quot;: &quot;Ratke, Cassin and Kertzmann&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aacc?text=sports+aliquam&quot;,
                    &quot;first_color&quot;: &quot;#398c72&quot;,
                    &quot;second_color&quot;: &quot;#645b2e&quot;,
                    &quot;year_of_foundation&quot;: 1969,
                    &quot;stadium&quot;: &quot;North Mariane Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ad-71b7-bde2-e2e804b24f0c&quot;,
                    &quot;name&quot;: &quot;Langosh-Ortiz&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009955?text=sports+natus&quot;,
                    &quot;first_color&quot;: &quot;#bc3b01&quot;,
                    &quot;second_color&quot;: &quot;#4518ec&quot;,
                    &quot;year_of_foundation&quot;: 1936,
                    &quot;stadium&quot;: &quot;Bryonmouth Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ad-71b7-bde2-e2e8055de486&quot;,
                    &quot;name&quot;: &quot;Heller Ltd&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009955?text=sports+ut&quot;,
                    &quot;first_color&quot;: &quot;#86c549&quot;,
                    &quot;second_color&quot;: &quot;#e46b73&quot;,
                    &quot;year_of_foundation&quot;: 1999,
                    &quot;stadium&quot;: &quot;New Jocelyn Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4ae-7151-8eb8-9cd75746cbea&quot;,
                    &quot;name&quot;: &quot;Paucek, Watsica and Blanda&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa33?text=sports+autem&quot;,
                    &quot;first_color&quot;: &quot;#5b6714&quot;,
                    &quot;second_color&quot;: &quot;#f17e17&quot;,
                    &quot;year_of_foundation&quot;: 1940,
                    &quot;stadium&quot;: &quot;East Alek Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d490-7172-85f3-0bdc888c975e&quot;,
            &quot;name&quot;: &quot;et in voluptatum&quot;,
            &quot;description&quot;: &quot;Iste et qui velit officia ea. Odio labore qui deserunt culpa eum. Error reiciendis dicta dignissimos repudiandae. Illo amet ad rem facilis ut. Laborum dolor eum impedit debitis eum.&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;teams&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4b0-708c-940e-1c44dd12b44a&quot;,
                    &quot;name&quot;: &quot;Carroll and Sons&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cccc?text=sports+maiores&quot;,
                    &quot;first_color&quot;: &quot;#878ee1&quot;,
                    &quot;second_color&quot;: &quot;#59245a&quot;,
                    &quot;year_of_foundation&quot;: 1969,
                    &quot;stadium&quot;: &quot;East Mallieland Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4b0-708c-940e-1c44ddf86de1&quot;,
                    &quot;name&quot;: &quot;Dibbert-Dicki&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077ff?text=sports+dolor&quot;,
                    &quot;first_color&quot;: &quot;#105896&quot;,
                    &quot;second_color&quot;: &quot;#d13281&quot;,
                    &quot;year_of_foundation&quot;: 1903,
                    &quot;stadium&quot;: &quot;North Kylaville Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4b0-708c-940e-1c44decf67c8&quot;,
                    &quot;name&quot;: &quot;Ryan, Metz and Sauer&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0033ee?text=sports+ea&quot;,
                    &quot;first_color&quot;: &quot;#c52ec5&quot;,
                    &quot;second_color&quot;: &quot;#cbb027&quot;,
                    &quot;year_of_foundation&quot;: 1913,
                    &quot;stadium&quot;: &quot;Port Tamaraview Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4b0-708c-940e-1c44df73ed6c&quot;,
                    &quot;name&quot;: &quot;Feest Ltd&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0000aa?text=sports+tenetur&quot;,
                    &quot;first_color&quot;: &quot;#7c0bab&quot;,
                    &quot;second_color&quot;: &quot;#2420ab&quot;,
                    &quot;year_of_foundation&quot;: 1979,
                    &quot;stadium&quot;: &quot;Bartolettiport Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4b1-71bb-aa1d-18713470a82f&quot;,
                    &quot;name&quot;: &quot;Ondricka-Smitham&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+debitis&quot;,
                    &quot;first_color&quot;: &quot;#d60f12&quot;,
                    &quot;second_color&quot;: &quot;#b90cf3&quot;,
                    &quot;year_of_foundation&quot;: 2011,
                    &quot;stadium&quot;: &quot;West Randal Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4b1-71bb-aa1d-187134716646&quot;,
                    &quot;name&quot;: &quot;Wiegand-Kohler&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004455?text=sports+possimus&quot;,
                    &quot;first_color&quot;: &quot;#770770&quot;,
                    &quot;second_color&quot;: &quot;#7c3956&quot;,
                    &quot;year_of_foundation&quot;: 1932,
                    &quot;stadium&quot;: &quot;New Christophe Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4b1-71bb-aa1d-1871350bf971&quot;,
                    &quot;name&quot;: &quot;Hintz-Bode&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+minima&quot;,
                    &quot;first_color&quot;: &quot;#b9ebaf&quot;,
                    &quot;second_color&quot;: &quot;#e585be&quot;,
                    &quot;year_of_foundation&quot;: 1925,
                    &quot;stadium&quot;: &quot;Jaydonstad Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4b1-71bb-aa1d-1871358b422e&quot;,
                    &quot;name&quot;: &quot;O&#039;Hara-Bogisich&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/005599?text=sports+sunt&quot;,
                    &quot;first_color&quot;: &quot;#adb519&quot;,
                    &quot;second_color&quot;: &quot;#44a7bc&quot;,
                    &quot;year_of_foundation&quot;: 1909,
                    &quot;stadium&quot;: &quot;Bellbury Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4b2-7378-ad1b-7711577665c5&quot;,
                    &quot;name&quot;: &quot;Torphy-Rippin&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd99?text=sports+iste&quot;,
                    &quot;first_color&quot;: &quot;#d19acf&quot;,
                    &quot;second_color&quot;: &quot;#2ca4f0&quot;,
                    &quot;year_of_foundation&quot;: 2001,
                    &quot;stadium&quot;: &quot;Nicholeview Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4b2-7378-ad1b-771157869641&quot;,
                    &quot;name&quot;: &quot;Smitham PLC&quot;,
                    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011ff?text=sports+perferendis&quot;,
                    &quot;first_color&quot;: &quot;#53b808&quot;,
                    &quot;second_color&quot;: &quot;#53b83c&quot;,
                    &quot;year_of_foundation&quot;: 1994,
                    &quot;stadium&quot;: &quot;Handview Stadium&quot;,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-competitions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-competitions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-competitions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-competitions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-competitions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-competitions" data-method="GET"
      data-path="api/competitions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-competitions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-competitions"
                    onclick="tryItOut('GETapi-competitions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-competitions"
                    onclick="cancelTryOut('GETapi-competitions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-competitions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/competitions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-competitions">POST api/competitions</h2>

<p>
</p>



<span id="example-requests-POSTapi-competitions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://football-app.test/api/competitions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"description\": \"Dolores dolorum amet iste laborum eius est dolor.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/competitions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "description": "Dolores dolorum amet iste laborum eius est dolor."
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-competitions">
</span>
<span id="execution-results-POSTapi-competitions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-competitions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-competitions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-competitions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-competitions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-competitions" data-method="POST"
      data-path="api/competitions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-competitions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-competitions"
                    onclick="tryItOut('POSTapi-competitions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-competitions"
                    onclick="cancelTryOut('POSTapi-competitions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-competitions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/competitions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-competitions"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-competitions"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-competitions--id-">GET api/competitions/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-competitions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://football-app.test/api/competitions/0197dc06-d48f-72b8-94f9-ac4426e2e81c" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/competitions/0197dc06-d48f-72b8-94f9-ac4426e2e81c"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-competitions--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: &quot;0197dc06-d48f-72b8-94f9-ac4426e2e81c&quot;,
    &quot;name&quot;: &quot;accusantium aut deserunt&quot;,
    &quot;description&quot;: &quot;Optio sunt omnis ut et. Officia nostrum vel qui voluptatem assumenda. Non ab soluta recusandae veniam ea odio iste. Facilis architecto explicabo voluptatem fugit eum.&quot;,
    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
    &quot;teams&quot;: [
        {
            &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd894ffb02d1&quot;,
            &quot;name&quot;: &quot;Blick LLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009966?text=sports+voluptas&quot;,
            &quot;first_color&quot;: &quot;#21f7a6&quot;,
            &quot;second_color&quot;: &quot;#22abdd&quot;,
            &quot;year_of_foundation&quot;: 1959,
            &quot;stadium&quot;: &quot;Daughertyhaven Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd895081f4c2&quot;,
            &quot;name&quot;: &quot;Effertz PLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066ff?text=sports+odit&quot;,
            &quot;first_color&quot;: &quot;#9ab8d1&quot;,
            &quot;second_color&quot;: &quot;#39b0a0&quot;,
            &quot;year_of_foundation&quot;: 1983,
            &quot;stadium&quot;: &quot;Mohamedport Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd8950fae5b9&quot;,
            &quot;name&quot;: &quot;Hoeger, Botsford and Emmerich&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eeaa?text=sports+aliquid&quot;,
            &quot;first_color&quot;: &quot;#de10f0&quot;,
            &quot;second_color&quot;: &quot;#c2ad85&quot;,
            &quot;year_of_foundation&quot;: 1904,
            &quot;stadium&quot;: &quot;Lake Jacintoside Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe0586ace&quot;,
            &quot;name&quot;: &quot;Roob-Crooks&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aabb?text=sports+eveniet&quot;,
            &quot;first_color&quot;: &quot;#cc23e9&quot;,
            &quot;second_color&quot;: &quot;#728357&quot;,
            &quot;year_of_foundation&quot;: 2021,
            &quot;stadium&quot;: &quot;Irwinfort Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe086cb55&quot;,
            &quot;name&quot;: &quot;Marquardt Ltd&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077aa?text=sports+ea&quot;,
            &quot;first_color&quot;: &quot;#e8a05e&quot;,
            &quot;second_color&quot;: &quot;#ec907a&quot;,
            &quot;year_of_foundation&quot;: 2005,
            &quot;stadium&quot;: &quot;Pollichfort Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe13f297d&quot;,
            &quot;name&quot;: &quot;Flatley, Altenwerth and Bins&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa11?text=sports+est&quot;,
            &quot;first_color&quot;: &quot;#273916&quot;,
            &quot;second_color&quot;: &quot;#15d0ad&quot;,
            &quot;year_of_foundation&quot;: 1961,
            &quot;stadium&quot;: &quot;Port Vadaport Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe15eed18&quot;,
            &quot;name&quot;: &quot;Schimmel, Block and D&#039;Amore&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ddbb?text=sports+at&quot;,
            &quot;first_color&quot;: &quot;#01b921&quot;,
            &quot;second_color&quot;: &quot;#7d4047&quot;,
            &quot;year_of_foundation&quot;: 1900,
            &quot;stadium&quot;: &quot;East Arnaldofort Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe1ec0509&quot;,
            &quot;name&quot;: &quot;Schmidt-Jones&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0099dd?text=sports+eius&quot;,
            &quot;first_color&quot;: &quot;#f85802&quot;,
            &quot;second_color&quot;: &quot;#8bbd6e&quot;,
            &quot;year_of_foundation&quot;: 1951,
            &quot;stadium&quot;: &quot;Port Suzanne Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e7289f18f&quot;,
            &quot;name&quot;: &quot;Kris-Schmidt&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eecc?text=sports+quos&quot;,
            &quot;first_color&quot;: &quot;#3b4a0e&quot;,
            &quot;second_color&quot;: &quot;#e5981e&quot;,
            &quot;year_of_foundation&quot;: 1946,
            &quot;stadium&quot;: &quot;Robynview Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e73174ce8&quot;,
            &quot;name&quot;: &quot;Schoen Inc&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ff55?text=sports+et&quot;,
            &quot;first_color&quot;: &quot;#2d9cfe&quot;,
            &quot;second_color&quot;: &quot;#8df426&quot;,
            &quot;year_of_foundation&quot;: 1960,
            &quot;stadium&quot;: &quot;Angusburgh Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e73b10df0&quot;,
            &quot;name&quot;: &quot;Runolfsson, Miller and Kris&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066cc?text=sports+modi&quot;,
            &quot;first_color&quot;: &quot;#7087e7&quot;,
            &quot;second_color&quot;: &quot;#8e3431&quot;,
            &quot;year_of_foundation&quot;: 1902,
            &quot;stadium&quot;: &quot;Catalinaborough Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065b368d8b&quot;,
            &quot;name&quot;: &quot;Huel, Schaefer and Heller&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ee00?text=sports+quisquam&quot;,
            &quot;first_color&quot;: &quot;#bb909f&quot;,
            &quot;second_color&quot;: &quot;#b37ec1&quot;,
            &quot;year_of_foundation&quot;: 1988,
            &quot;stadium&quot;: &quot;Devenmouth Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065b38117c&quot;,
            &quot;name&quot;: &quot;Fisher-Daugherty&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008822?text=sports+perferendis&quot;,
            &quot;first_color&quot;: &quot;#bd17c2&quot;,
            &quot;second_color&quot;: &quot;#3270cb&quot;,
            &quot;year_of_foundation&quot;: 1905,
            &quot;stadium&quot;: &quot;Marionbury Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065bd50bba&quot;,
            &quot;name&quot;: &quot;Auer Inc&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/007733?text=sports+est&quot;,
            &quot;first_color&quot;: &quot;#c8543a&quot;,
            &quot;second_color&quot;: &quot;#7d33e3&quot;,
            &quot;year_of_foundation&quot;: 1931,
            &quot;stadium&quot;: &quot;Smithhaven Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        }
    ],
    &quot;matches&quot;: [
        {
            &quot;id&quot;: &quot;0197dc06-d4cb-7181-966b-c35eec4ddc50&quot;,
            &quot;date&quot;: &quot;2025-06-25T13:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 3,
            &quot;goal_away&quot;: 4,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd894ffb02d1&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009966?text=sports+voluptas&quot;,
                &quot;first_color&quot;: &quot;#21f7a6&quot;,
                &quot;second_color&quot;: &quot;#22abdd&quot;,
                &quot;year_of_foundation&quot;: 1959,
                &quot;stadium&quot;: &quot;Daughertyhaven Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe15eed18&quot;,
                &quot;name&quot;: &quot;Schimmel, Block and D&#039;Amore&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ddbb?text=sports+at&quot;,
                &quot;first_color&quot;: &quot;#01b921&quot;,
                &quot;second_color&quot;: &quot;#7d4047&quot;,
                &quot;year_of_foundation&quot;: 1900,
                &quot;stadium&quot;: &quot;East Arnaldofort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ce-73f3-9c79-dff573cd2d7d&quot;,
            &quot;date&quot;: &quot;2025-06-25T07:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 4,
            &quot;goal_away&quot;: 5,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe13f297d&quot;,
                &quot;name&quot;: &quot;Flatley, Altenwerth and Bins&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa11?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#273916&quot;,
                &quot;second_color&quot;: &quot;#15d0ad&quot;,
                &quot;year_of_foundation&quot;: 1961,
                &quot;stadium&quot;: &quot;Port Vadaport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e7289f18f&quot;,
                &quot;name&quot;: &quot;Kris-Schmidt&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eecc?text=sports+quos&quot;,
                &quot;first_color&quot;: &quot;#3b4a0e&quot;,
                &quot;second_color&quot;: &quot;#e5981e&quot;,
                &quot;year_of_foundation&quot;: 1946,
                &quot;stadium&quot;: &quot;Robynview Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4d0-7126-8444-d4fb55938fcf&quot;,
            &quot;date&quot;: &quot;2025-05-17T09:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 4,
            &quot;goal_away&quot;: 3,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd894ffb02d1&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009966?text=sports+voluptas&quot;,
                &quot;first_color&quot;: &quot;#21f7a6&quot;,
                &quot;second_color&quot;: &quot;#22abdd&quot;,
                &quot;year_of_foundation&quot;: 1959,
                &quot;stadium&quot;: &quot;Daughertyhaven Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe086cb55&quot;,
                &quot;name&quot;: &quot;Marquardt Ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077aa?text=sports+ea&quot;,
                &quot;first_color&quot;: &quot;#e8a05e&quot;,
                &quot;second_color&quot;: &quot;#ec907a&quot;,
                &quot;year_of_foundation&quot;: 2005,
                &quot;stadium&quot;: &quot;Pollichfort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4d1-737b-a5df-8355497491d8&quot;,
            &quot;date&quot;: &quot;2025-05-30T12:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 3,
            &quot;goal_away&quot;: 3,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd8950fae5b9&quot;,
                &quot;name&quot;: &quot;Hoeger, Botsford and Emmerich&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eeaa?text=sports+aliquid&quot;,
                &quot;first_color&quot;: &quot;#de10f0&quot;,
                &quot;second_color&quot;: &quot;#c2ad85&quot;,
                &quot;year_of_foundation&quot;: 1904,
                &quot;stadium&quot;: &quot;Lake Jacintoside Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe13f297d&quot;,
                &quot;name&quot;: &quot;Flatley, Altenwerth and Bins&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa11?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#273916&quot;,
                &quot;second_color&quot;: &quot;#15d0ad&quot;,
                &quot;year_of_foundation&quot;: 1961,
                &quot;stadium&quot;: &quot;Port Vadaport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4d2-7017-b0e7-ef63844a5f8e&quot;,
            &quot;date&quot;: &quot;2025-05-07T14:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 1,
            &quot;goal_away&quot;: 5,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe1ec0509&quot;,
                &quot;name&quot;: &quot;Schmidt-Jones&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0099dd?text=sports+eius&quot;,
                &quot;first_color&quot;: &quot;#f85802&quot;,
                &quot;second_color&quot;: &quot;#8bbd6e&quot;,
                &quot;year_of_foundation&quot;: 1951,
                &quot;stadium&quot;: &quot;Port Suzanne Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065b368d8b&quot;,
                &quot;name&quot;: &quot;Huel, Schaefer and Heller&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ee00?text=sports+quisquam&quot;,
                &quot;first_color&quot;: &quot;#bb909f&quot;,
                &quot;second_color&quot;: &quot;#b37ec1&quot;,
                &quot;year_of_foundation&quot;: 1988,
                &quot;stadium&quot;: &quot;Devenmouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4d4-7041-96dd-2ba4b5023d70&quot;,
            &quot;date&quot;: &quot;2025-07-02T11:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 1,
            &quot;goal_away&quot;: 4,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd894ffb02d1&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009966?text=sports+voluptas&quot;,
                &quot;first_color&quot;: &quot;#21f7a6&quot;,
                &quot;second_color&quot;: &quot;#22abdd&quot;,
                &quot;year_of_foundation&quot;: 1959,
                &quot;stadium&quot;: &quot;Daughertyhaven Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e73174ce8&quot;,
                &quot;name&quot;: &quot;Schoen Inc&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ff55?text=sports+et&quot;,
                &quot;first_color&quot;: &quot;#2d9cfe&quot;,
                &quot;second_color&quot;: &quot;#8df426&quot;,
                &quot;year_of_foundation&quot;: 1960,
                &quot;stadium&quot;: &quot;Angusburgh Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4d5-71b9-b5a2-ff79b9bfc867&quot;,
            &quot;date&quot;: &quot;2025-05-12T08:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 0,
            &quot;goal_away&quot;: 0,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd8950fae5b9&quot;,
                &quot;name&quot;: &quot;Hoeger, Botsford and Emmerich&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eeaa?text=sports+aliquid&quot;,
                &quot;first_color&quot;: &quot;#de10f0&quot;,
                &quot;second_color&quot;: &quot;#c2ad85&quot;,
                &quot;year_of_foundation&quot;: 1904,
                &quot;stadium&quot;: &quot;Lake Jacintoside Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065bd50bba&quot;,
                &quot;name&quot;: &quot;Auer Inc&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/007733?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#c8543a&quot;,
                &quot;second_color&quot;: &quot;#7d33e3&quot;,
                &quot;year_of_foundation&quot;: 1931,
                &quot;stadium&quot;: &quot;Smithhaven Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4d5-71b9-b5a2-ff79ba262bfe&quot;,
            &quot;date&quot;: &quot;2025-06-18T08:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 1,
            &quot;goal_away&quot;: 3,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd894ffb02d1&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009966?text=sports+voluptas&quot;,
                &quot;first_color&quot;: &quot;#21f7a6&quot;,
                &quot;second_color&quot;: &quot;#22abdd&quot;,
                &quot;year_of_foundation&quot;: 1959,
                &quot;stadium&quot;: &quot;Daughertyhaven Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe0586ace&quot;,
                &quot;name&quot;: &quot;Roob-Crooks&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aabb?text=sports+eveniet&quot;,
                &quot;first_color&quot;: &quot;#cc23e9&quot;,
                &quot;second_color&quot;: &quot;#728357&quot;,
                &quot;year_of_foundation&quot;: 2021,
                &quot;stadium&quot;: &quot;Irwinfort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4d7-70f2-ae59-e965fdcac5ef&quot;,
            &quot;date&quot;: &quot;2025-05-07T12:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 4,
            &quot;goal_away&quot;: 1,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd895081f4c2&quot;,
                &quot;name&quot;: &quot;Effertz PLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066ff?text=sports+odit&quot;,
                &quot;first_color&quot;: &quot;#9ab8d1&quot;,
                &quot;second_color&quot;: &quot;#39b0a0&quot;,
                &quot;year_of_foundation&quot;: 1983,
                &quot;stadium&quot;: &quot;Mohamedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe086cb55&quot;,
                &quot;name&quot;: &quot;Marquardt Ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077aa?text=sports+ea&quot;,
                &quot;first_color&quot;: &quot;#e8a05e&quot;,
                &quot;second_color&quot;: &quot;#ec907a&quot;,
                &quot;year_of_foundation&quot;: 2005,
                &quot;stadium&quot;: &quot;Pollichfort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4d8-7223-932b-4cc98e93ea73&quot;,
            &quot;date&quot;: &quot;2025-06-13T09:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 3,
            &quot;goal_away&quot;: 3,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e7289f18f&quot;,
                &quot;name&quot;: &quot;Kris-Schmidt&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eecc?text=sports+quos&quot;,
                &quot;first_color&quot;: &quot;#3b4a0e&quot;,
                &quot;second_color&quot;: &quot;#e5981e&quot;,
                &quot;year_of_foundation&quot;: 1946,
                &quot;stadium&quot;: &quot;Robynview Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065bd50bba&quot;,
                &quot;name&quot;: &quot;Auer Inc&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/007733?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#c8543a&quot;,
                &quot;second_color&quot;: &quot;#7d33e3&quot;,
                &quot;year_of_foundation&quot;: 1931,
                &quot;stadium&quot;: &quot;Smithhaven Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4d9-73e6-a046-20d72911025b&quot;,
            &quot;date&quot;: &quot;2025-06-04T12:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 4,
            &quot;goal_away&quot;: 5,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd895081f4c2&quot;,
                &quot;name&quot;: &quot;Effertz PLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066ff?text=sports+odit&quot;,
                &quot;first_color&quot;: &quot;#9ab8d1&quot;,
                &quot;second_color&quot;: &quot;#39b0a0&quot;,
                &quot;year_of_foundation&quot;: 1983,
                &quot;stadium&quot;: &quot;Mohamedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe15eed18&quot;,
                &quot;name&quot;: &quot;Schimmel, Block and D&#039;Amore&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ddbb?text=sports+at&quot;,
                &quot;first_color&quot;: &quot;#01b921&quot;,
                &quot;second_color&quot;: &quot;#7d4047&quot;,
                &quot;year_of_foundation&quot;: 1900,
                &quot;stadium&quot;: &quot;East Arnaldofort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4db-7338-8376-21eb30da2721&quot;,
            &quot;date&quot;: &quot;2025-06-11T12:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 1,
            &quot;goal_away&quot;: 4,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd895081f4c2&quot;,
                &quot;name&quot;: &quot;Effertz PLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066ff?text=sports+odit&quot;,
                &quot;first_color&quot;: &quot;#9ab8d1&quot;,
                &quot;second_color&quot;: &quot;#39b0a0&quot;,
                &quot;year_of_foundation&quot;: 1983,
                &quot;stadium&quot;: &quot;Mohamedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe086cb55&quot;,
                &quot;name&quot;: &quot;Marquardt Ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077aa?text=sports+ea&quot;,
                &quot;first_color&quot;: &quot;#e8a05e&quot;,
                &quot;second_color&quot;: &quot;#ec907a&quot;,
                &quot;year_of_foundation&quot;: 2005,
                &quot;stadium&quot;: &quot;Pollichfort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4dc-7293-8f45-cfe504e3e821&quot;,
            &quot;date&quot;: &quot;2025-06-10T08:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 2,
            &quot;goal_away&quot;: 0,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe0586ace&quot;,
                &quot;name&quot;: &quot;Roob-Crooks&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aabb?text=sports+eveniet&quot;,
                &quot;first_color&quot;: &quot;#cc23e9&quot;,
                &quot;second_color&quot;: &quot;#728357&quot;,
                &quot;year_of_foundation&quot;: 2021,
                &quot;stadium&quot;: &quot;Irwinfort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe15eed18&quot;,
                &quot;name&quot;: &quot;Schimmel, Block and D&#039;Amore&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ddbb?text=sports+at&quot;,
                &quot;first_color&quot;: &quot;#01b921&quot;,
                &quot;second_color&quot;: &quot;#7d4047&quot;,
                &quot;year_of_foundation&quot;: 1900,
                &quot;stadium&quot;: &quot;East Arnaldofort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4dc-7293-8f45-cfe5056ae2bf&quot;,
            &quot;date&quot;: &quot;2025-05-24T07:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 3,
            &quot;goal_away&quot;: 4,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd8950fae5b9&quot;,
                &quot;name&quot;: &quot;Hoeger, Botsford and Emmerich&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eeaa?text=sports+aliquid&quot;,
                &quot;first_color&quot;: &quot;#de10f0&quot;,
                &quot;second_color&quot;: &quot;#c2ad85&quot;,
                &quot;year_of_foundation&quot;: 1904,
                &quot;stadium&quot;: &quot;Lake Jacintoside Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe1ec0509&quot;,
                &quot;name&quot;: &quot;Schmidt-Jones&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0099dd?text=sports+eius&quot;,
                &quot;first_color&quot;: &quot;#f85802&quot;,
                &quot;second_color&quot;: &quot;#8bbd6e&quot;,
                &quot;year_of_foundation&quot;: 1951,
                &quot;stadium&quot;: &quot;Port Suzanne Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4dd-7033-be34-017a8f33db3d&quot;,
            &quot;date&quot;: &quot;2025-05-10T14:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 1,
            &quot;goal_away&quot;: 1,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd894ffb02d1&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009966?text=sports+voluptas&quot;,
                &quot;first_color&quot;: &quot;#21f7a6&quot;,
                &quot;second_color&quot;: &quot;#22abdd&quot;,
                &quot;year_of_foundation&quot;: 1959,
                &quot;stadium&quot;: &quot;Daughertyhaven Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065b38117c&quot;,
                &quot;name&quot;: &quot;Fisher-Daugherty&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008822?text=sports+perferendis&quot;,
                &quot;first_color&quot;: &quot;#bd17c2&quot;,
                &quot;second_color&quot;: &quot;#3270cb&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Marionbury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4df-7069-906d-e3ed3433ccee&quot;,
            &quot;date&quot;: &quot;2025-05-29T10:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 3,
            &quot;goal_away&quot;: 3,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd895081f4c2&quot;,
                &quot;name&quot;: &quot;Effertz PLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066ff?text=sports+odit&quot;,
                &quot;first_color&quot;: &quot;#9ab8d1&quot;,
                &quot;second_color&quot;: &quot;#39b0a0&quot;,
                &quot;year_of_foundation&quot;: 1983,
                &quot;stadium&quot;: &quot;Mohamedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e73174ce8&quot;,
                &quot;name&quot;: &quot;Schoen Inc&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ff55?text=sports+et&quot;,
                &quot;first_color&quot;: &quot;#2d9cfe&quot;,
                &quot;second_color&quot;: &quot;#8df426&quot;,
                &quot;year_of_foundation&quot;: 1960,
                &quot;stadium&quot;: &quot;Angusburgh Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4e0-7293-8aaa-9f4eb5ef764f&quot;,
            &quot;date&quot;: &quot;2025-05-28T10:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 4,
            &quot;goal_away&quot;: 0,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe1ec0509&quot;,
                &quot;name&quot;: &quot;Schmidt-Jones&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0099dd?text=sports+eius&quot;,
                &quot;first_color&quot;: &quot;#f85802&quot;,
                &quot;second_color&quot;: &quot;#8bbd6e&quot;,
                &quot;year_of_foundation&quot;: 1951,
                &quot;stadium&quot;: &quot;Port Suzanne Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e73b10df0&quot;,
                &quot;name&quot;: &quot;Runolfsson, Miller and Kris&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066cc?text=sports+modi&quot;,
                &quot;first_color&quot;: &quot;#7087e7&quot;,
                &quot;second_color&quot;: &quot;#8e3431&quot;,
                &quot;year_of_foundation&quot;: 1902,
                &quot;stadium&quot;: &quot;Catalinaborough Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4e1-7321-adad-4a7a752f6856&quot;,
            &quot;date&quot;: &quot;2025-05-23T07:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 2,
            &quot;goal_away&quot;: 4,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe0586ace&quot;,
                &quot;name&quot;: &quot;Roob-Crooks&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aabb?text=sports+eveniet&quot;,
                &quot;first_color&quot;: &quot;#cc23e9&quot;,
                &quot;second_color&quot;: &quot;#728357&quot;,
                &quot;year_of_foundation&quot;: 2021,
                &quot;stadium&quot;: &quot;Irwinfort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065b38117c&quot;,
                &quot;name&quot;: &quot;Fisher-Daugherty&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008822?text=sports+perferendis&quot;,
                &quot;first_color&quot;: &quot;#bd17c2&quot;,
                &quot;second_color&quot;: &quot;#3270cb&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Marionbury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4e1-7321-adad-4a7a75dc1975&quot;,
            &quot;date&quot;: &quot;2025-06-29T09:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 2,
            &quot;goal_away&quot;: 2,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd894ffb02d1&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009966?text=sports+voluptas&quot;,
                &quot;first_color&quot;: &quot;#21f7a6&quot;,
                &quot;second_color&quot;: &quot;#22abdd&quot;,
                &quot;year_of_foundation&quot;: 1959,
                &quot;stadium&quot;: &quot;Daughertyhaven Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe086cb55&quot;,
                &quot;name&quot;: &quot;Marquardt Ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077aa?text=sports+ea&quot;,
                &quot;first_color&quot;: &quot;#e8a05e&quot;,
                &quot;second_color&quot;: &quot;#ec907a&quot;,
                &quot;year_of_foundation&quot;: 2005,
                &quot;stadium&quot;: &quot;Pollichfort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4e3-7102-9cbb-763055009014&quot;,
            &quot;date&quot;: &quot;2025-05-09T09:18:44.000000Z&quot;,
            &quot;goal_home&quot;: 2,
            &quot;goal_away&quot;: 2,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;home_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd894ffb02d1&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009966?text=sports+voluptas&quot;,
                &quot;first_color&quot;: &quot;#21f7a6&quot;,
                &quot;second_color&quot;: &quot;#22abdd&quot;,
                &quot;year_of_foundation&quot;: 1959,
                &quot;stadium&quot;: &quot;Daughertyhaven Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            },
            &quot;away_team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065b38117c&quot;,
                &quot;name&quot;: &quot;Fisher-Daugherty&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008822?text=sports+perferendis&quot;,
                &quot;first_color&quot;: &quot;#bd17c2&quot;,
                &quot;second_color&quot;: &quot;#3270cb&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Marionbury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-competitions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-competitions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-competitions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-competitions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-competitions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-competitions--id-" data-method="GET"
      data-path="api/competitions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-competitions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-competitions--id-"
                    onclick="tryItOut('GETapi-competitions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-competitions--id-"
                    onclick="cancelTryOut('GETapi-competitions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-competitions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/competitions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-competitions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-competitions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-competitions--id-"
               value="0197dc06-d48f-72b8-94f9-ac4426e2e81c"
               data-component="url">
    <br>
<p>The ID of the competition. Example: <code>0197dc06-d48f-72b8-94f9-ac4426e2e81c</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-competitions--id-">PUT api/competitions/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-competitions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://football-app.test/api/competitions/0197dc06-d48f-72b8-94f9-ac4426e2e81c" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"description\": \"Dolores dolorum amet iste laborum eius est dolor.\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/competitions/0197dc06-d48f-72b8-94f9-ac4426e2e81c"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "description": "Dolores dolorum amet iste laborum eius est dolor."
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-competitions--id-">
</span>
<span id="execution-results-PUTapi-competitions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-competitions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-competitions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-competitions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-competitions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-competitions--id-" data-method="PUT"
      data-path="api/competitions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-competitions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-competitions--id-"
                    onclick="tryItOut('PUTapi-competitions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-competitions--id-"
                    onclick="cancelTryOut('PUTapi-competitions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-competitions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/competitions/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/competitions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-competitions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-competitions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-competitions--id-"
               value="0197dc06-d48f-72b8-94f9-ac4426e2e81c"
               data-component="url">
    <br>
<p>The ID of the competition. Example: <code>0197dc06-d48f-72b8-94f9-ac4426e2e81c</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-competitions--id-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-competitions--id-"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-competitions--id-">DELETE api/competitions/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-competitions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://football-app.test/api/competitions/0197dc06-d48f-72b8-94f9-ac4426e2e81c" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/competitions/0197dc06-d48f-72b8-94f9-ac4426e2e81c"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-competitions--id-">
</span>
<span id="execution-results-DELETEapi-competitions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-competitions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-competitions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-competitions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-competitions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-competitions--id-" data-method="DELETE"
      data-path="api/competitions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-competitions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-competitions--id-"
                    onclick="tryItOut('DELETEapi-competitions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-competitions--id-"
                    onclick="cancelTryOut('DELETEapi-competitions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-competitions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/competitions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-competitions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-competitions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-competitions--id-"
               value="0197dc06-d48f-72b8-94f9-ac4426e2e81c"
               data-component="url">
    <br>
<p>The ID of the competition. Example: <code>0197dc06-d48f-72b8-94f9-ac4426e2e81c</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-teams">GET api/teams</h2>

<p>
</p>



<span id="example-requests-GETapi-teams">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://football-app.test/api/teams" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/teams"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-teams">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
            &quot;name&quot;: &quot;Blick LLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
            &quot;first_color&quot;: &quot;#e3883f&quot;,
            &quot;second_color&quot;: &quot;#f32005&quot;,
            &quot;year_of_foundation&quot;: 1909,
            &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d429-7363-8b05-6cc9d20b07bd&quot;,
                    &quot;first_name&quot;: &quot;Saige&quot;,
                    &quot;last_name&quot;: &quot;Hegmann&quot;,
                    &quot;full_name&quot;: &quot;Saige Hegmann&quot;,
                    &quot;birth_date&quot;: &quot;1994-10-24T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 10,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d42b-702a-a7b1-5d7beb1d1747&quot;,
                    &quot;first_name&quot;: &quot;Lester&quot;,
                    &quot;last_name&quot;: &quot;Koss&quot;,
                    &quot;full_name&quot;: &quot;Lester Koss&quot;,
                    &quot;birth_date&quot;: &quot;2005-02-06T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 1,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d42c-73c3-ac09-53a36d03d3ef&quot;,
                    &quot;first_name&quot;: &quot;Tate&quot;,
                    &quot;last_name&quot;: &quot;Veum&quot;,
                    &quot;full_name&quot;: &quot;Tate Veum&quot;,
                    &quot;birth_date&quot;: &quot;1994-09-09T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 64,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d42c-73c3-ac09-53a36d9d2eb6&quot;,
                    &quot;first_name&quot;: &quot;Christopher&quot;,
                    &quot;last_name&quot;: &quot;Marvin&quot;,
                    &quot;full_name&quot;: &quot;Christopher Marvin&quot;,
                    &quot;birth_date&quot;: &quot;1993-12-11T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 41,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d42d-73c9-a148-8b99743cd32a&quot;,
                    &quot;first_name&quot;: &quot;Waldo&quot;,
                    &quot;last_name&quot;: &quot;Corkery&quot;,
                    &quot;full_name&quot;: &quot;Waldo Corkery&quot;,
                    &quot;birth_date&quot;: &quot;1985-07-09T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 42,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d42e-70f5-b694-50c100a5afdd&quot;,
                    &quot;first_name&quot;: &quot;Seth&quot;,
                    &quot;last_name&quot;: &quot;Schmidt&quot;,
                    &quot;full_name&quot;: &quot;Seth Schmidt&quot;,
                    &quot;birth_date&quot;: &quot;2000-09-27T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 56,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d42e-70f5-b694-50c1017be791&quot;,
                    &quot;first_name&quot;: &quot;Jabari&quot;,
                    &quot;last_name&quot;: &quot;Ullrich&quot;,
                    &quot;full_name&quot;: &quot;Jabari Ullrich&quot;,
                    &quot;birth_date&quot;: &quot;1996-04-19T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 15,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d42f-720f-88f0-61893cf22428&quot;,
                    &quot;first_name&quot;: &quot;Kirk&quot;,
                    &quot;last_name&quot;: &quot;Bruen&quot;,
                    &quot;full_name&quot;: &quot;Kirk Bruen&quot;,
                    &quot;birth_date&quot;: &quot;2000-07-19T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 57,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d430-73d2-a834-a27673e474cd&quot;,
                    &quot;first_name&quot;: &quot;Aiden&quot;,
                    &quot;last_name&quot;: &quot;Willms&quot;,
                    &quot;full_name&quot;: &quot;Aiden Willms&quot;,
                    &quot;birth_date&quot;: &quot;1992-10-06T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 20,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d430-73d2-a834-a27674cda255&quot;,
                    &quot;first_name&quot;: &quot;Mario&quot;,
                    &quot;last_name&quot;: &quot;Rowe&quot;,
                    &quot;full_name&quot;: &quot;Mario Rowe&quot;,
                    &quot;birth_date&quot;: &quot;1990-03-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 66,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d431-7106-8e29-e1b43e25a817&quot;,
                    &quot;first_name&quot;: &quot;Jameson&quot;,
                    &quot;last_name&quot;: &quot;Leannon&quot;,
                    &quot;full_name&quot;: &quot;Jameson Leannon&quot;,
                    &quot;birth_date&quot;: &quot;2004-02-26T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 90,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d431-7106-8e29-e1b43e31231c&quot;,
                    &quot;first_name&quot;: &quot;Doris&quot;,
                    &quot;last_name&quot;: &quot;Orn&quot;,
                    &quot;full_name&quot;: &quot;Doris Orn&quot;,
                    &quot;birth_date&quot;: &quot;1989-03-05T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 98,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d432-717b-aa12-48a4157391c9&quot;,
                    &quot;first_name&quot;: &quot;Tate&quot;,
                    &quot;last_name&quot;: &quot;Hoppe&quot;,
                    &quot;full_name&quot;: &quot;Tate Hoppe&quot;,
                    &quot;birth_date&quot;: &quot;2004-11-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 23,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d433-72bc-afc3-11e861233342&quot;,
                    &quot;first_name&quot;: &quot;Derick&quot;,
                    &quot;last_name&quot;: &quot;Ullrich&quot;,
                    &quot;full_name&quot;: &quot;Derick Ullrich&quot;,
                    &quot;birth_date&quot;: &quot;1991-01-26T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 55,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d434-72fc-ace7-c2f90d6de70a&quot;,
                    &quot;first_name&quot;: &quot;Diamond&quot;,
                    &quot;last_name&quot;: &quot;Olson&quot;,
                    &quot;full_name&quot;: &quot;Diamond Olson&quot;,
                    &quot;birth_date&quot;: &quot;1992-08-27T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 61,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d434-72fc-ace7-c2f90dac1e33&quot;,
                    &quot;first_name&quot;: &quot;Gust&quot;,
                    &quot;last_name&quot;: &quot;Jast&quot;,
                    &quot;full_name&quot;: &quot;Gust Jast&quot;,
                    &quot;birth_date&quot;: &quot;1989-11-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 13,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d435-702a-abb0-643b088135a6&quot;,
                    &quot;first_name&quot;: &quot;Herman&quot;,
                    &quot;last_name&quot;: &quot;Lebsack&quot;,
                    &quot;full_name&quot;: &quot;Herman Lebsack&quot;,
                    &quot;birth_date&quot;: &quot;1987-05-28T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 49,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
            &quot;name&quot;: &quot;Metz-Wiza&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
            &quot;first_color&quot;: &quot;#6d3d0f&quot;,
            &quot;second_color&quot;: &quot;#49cc64&quot;,
            &quot;year_of_foundation&quot;: 2003,
            &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa90423716&quot;,
                    &quot;first_name&quot;: &quot;Roscoe&quot;,
                    &quot;last_name&quot;: &quot;Rodriguez&quot;,
                    &quot;full_name&quot;: &quot;Roscoe Rodriguez&quot;,
                    &quot;birth_date&quot;: &quot;1999-02-01T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 96,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d437-73b1-aece-5b7102791db2&quot;,
                    &quot;first_name&quot;: &quot;Herminio&quot;,
                    &quot;last_name&quot;: &quot;Funk&quot;,
                    &quot;full_name&quot;: &quot;Herminio Funk&quot;,
                    &quot;birth_date&quot;: &quot;1995-12-27T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 31,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d438-7172-bdad-ec5618bb40db&quot;,
                    &quot;first_name&quot;: &quot;Geovany&quot;,
                    &quot;last_name&quot;: &quot;Harris&quot;,
                    &quot;full_name&quot;: &quot;Geovany Harris&quot;,
                    &quot;birth_date&quot;: &quot;1994-09-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 34,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d439-7064-b03f-42a1ac541e67&quot;,
                    &quot;first_name&quot;: &quot;Rene&quot;,
                    &quot;last_name&quot;: &quot;Fadel&quot;,
                    &quot;full_name&quot;: &quot;Rene Fadel&quot;,
                    &quot;birth_date&quot;: &quot;1991-05-17T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 89,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d43a-73e3-9962-75fdf02c57df&quot;,
                    &quot;first_name&quot;: &quot;Glen&quot;,
                    &quot;last_name&quot;: &quot;Konopelski&quot;,
                    &quot;full_name&quot;: &quot;Glen Konopelski&quot;,
                    &quot;birth_date&quot;: &quot;1995-11-19T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 28,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d43b-723b-93ae-7bf963529658&quot;,
                    &quot;first_name&quot;: &quot;Peter&quot;,
                    &quot;last_name&quot;: &quot;Barrows&quot;,
                    &quot;full_name&quot;: &quot;Peter Barrows&quot;,
                    &quot;birth_date&quot;: &quot;1986-11-08T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 70,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d43b-723b-93ae-7bf9644cb971&quot;,
                    &quot;first_name&quot;: &quot;Mason&quot;,
                    &quot;last_name&quot;: &quot;Jerde&quot;,
                    &quot;full_name&quot;: &quot;Mason Jerde&quot;,
                    &quot;birth_date&quot;: &quot;1996-07-09T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 30,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d43c-726f-afd5-9a5dacb716fc&quot;,
                    &quot;first_name&quot;: &quot;Jaron&quot;,
                    &quot;last_name&quot;: &quot;Bernier&quot;,
                    &quot;full_name&quot;: &quot;Jaron Bernier&quot;,
                    &quot;birth_date&quot;: &quot;1998-05-24T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 82,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d43d-70cc-b00f-79e2a5578b0e&quot;,
                    &quot;first_name&quot;: &quot;Brian&quot;,
                    &quot;last_name&quot;: &quot;Moen&quot;,
                    &quot;full_name&quot;: &quot;Brian Moen&quot;,
                    &quot;birth_date&quot;: &quot;2002-06-22T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 69,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d43e-70f1-a603-5a576f9d2aeb&quot;,
                    &quot;first_name&quot;: &quot;Dee&quot;,
                    &quot;last_name&quot;: &quot;Tremblay&quot;,
                    &quot;full_name&quot;: &quot;Dee Tremblay&quot;,
                    &quot;birth_date&quot;: &quot;2002-10-12T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 23,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d43f-7147-b327-c6e2ffc4831b&quot;,
                    &quot;first_name&quot;: &quot;Price&quot;,
                    &quot;last_name&quot;: &quot;Gleason&quot;,
                    &quot;full_name&quot;: &quot;Price Gleason&quot;,
                    &quot;birth_date&quot;: &quot;2004-04-20T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 46,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d43f-7147-b327-c6e2fff78453&quot;,
                    &quot;first_name&quot;: &quot;Cade&quot;,
                    &quot;last_name&quot;: &quot;Becker&quot;,
                    &quot;full_name&quot;: &quot;Cade Becker&quot;,
                    &quot;birth_date&quot;: &quot;1993-04-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 38,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d440-7057-8081-58861e59e37b&quot;,
                    &quot;first_name&quot;: &quot;Rodolfo&quot;,
                    &quot;last_name&quot;: &quot;Carter&quot;,
                    &quot;full_name&quot;: &quot;Rodolfo Carter&quot;,
                    &quot;birth_date&quot;: &quot;1988-04-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 32,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d441-712a-8411-5567872a30a0&quot;,
                    &quot;first_name&quot;: &quot;Brock&quot;,
                    &quot;last_name&quot;: &quot;Denesik&quot;,
                    &quot;full_name&quot;: &quot;Brock Denesik&quot;,
                    &quot;birth_date&quot;: &quot;2003-04-24T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 2,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d442-7256-8af0-d0750d0c406a&quot;,
                    &quot;first_name&quot;: &quot;Barry&quot;,
                    &quot;last_name&quot;: &quot;Schmeler&quot;,
                    &quot;full_name&quot;: &quot;Barry Schmeler&quot;,
                    &quot;birth_date&quot;: &quot;1998-04-17T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 74,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d442-7256-8af0-d0750d497ece&quot;,
                    &quot;first_name&quot;: &quot;Tremaine&quot;,
                    &quot;last_name&quot;: &quot;Orn&quot;,
                    &quot;full_name&quot;: &quot;Tremaine Orn&quot;,
                    &quot;birth_date&quot;: &quot;1997-11-11T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 64,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6a832c73&quot;,
                    &quot;first_name&quot;: &quot;Boyd&quot;,
                    &quot;last_name&quot;: &quot;Donnelly&quot;,
                    &quot;full_name&quot;: &quot;Boyd Donnelly&quot;,
                    &quot;birth_date&quot;: &quot;1991-10-15T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 25,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
            &quot;name&quot;: &quot;Kris and Sons&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
            &quot;first_color&quot;: &quot;#0de1cc&quot;,
            &quot;second_color&quot;: &quot;#f4e7e0&quot;,
            &quot;year_of_foundation&quot;: 1905,
            &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d444-7319-afaa-d3998f7007b5&quot;,
                    &quot;first_name&quot;: &quot;Brown&quot;,
                    &quot;last_name&quot;: &quot;Abernathy&quot;,
                    &quot;full_name&quot;: &quot;Brown Abernathy&quot;,
                    &quot;birth_date&quot;: &quot;1985-09-05T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 46,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d444-7319-afaa-d3998f91f113&quot;,
                    &quot;first_name&quot;: &quot;Sherwood&quot;,
                    &quot;last_name&quot;: &quot;Ruecker&quot;,
                    &quot;full_name&quot;: &quot;Sherwood Ruecker&quot;,
                    &quot;birth_date&quot;: &quot;1989-08-07T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 62,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d445-738c-aaf2-783f3e85a0cf&quot;,
                    &quot;first_name&quot;: &quot;Santa&quot;,
                    &quot;last_name&quot;: &quot;Bosco&quot;,
                    &quot;full_name&quot;: &quot;Santa Bosco&quot;,
                    &quot;birth_date&quot;: &quot;1990-09-12T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 47,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d446-7291-bc72-4944abb5a029&quot;,
                    &quot;first_name&quot;: &quot;Jeremy&quot;,
                    &quot;last_name&quot;: &quot;Kiehn&quot;,
                    &quot;full_name&quot;: &quot;Jeremy Kiehn&quot;,
                    &quot;birth_date&quot;: &quot;1997-12-13T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 32,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d446-7291-bc72-4944acaa5eda&quot;,
                    &quot;first_name&quot;: &quot;Turner&quot;,
                    &quot;last_name&quot;: &quot;Mitchell&quot;,
                    &quot;full_name&quot;: &quot;Turner Mitchell&quot;,
                    &quot;birth_date&quot;: &quot;1988-03-23T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 5,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d446-7291-bc72-4944acdc458d&quot;,
                    &quot;first_name&quot;: &quot;Keven&quot;,
                    &quot;last_name&quot;: &quot;Bernhard&quot;,
                    &quot;full_name&quot;: &quot;Keven Bernhard&quot;,
                    &quot;birth_date&quot;: &quot;1989-05-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 72,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d447-7393-b126-d4ff7e7aa03f&quot;,
                    &quot;first_name&quot;: &quot;Helmer&quot;,
                    &quot;last_name&quot;: &quot;Kemmer&quot;,
                    &quot;full_name&quot;: &quot;Helmer Kemmer&quot;,
                    &quot;birth_date&quot;: &quot;1985-12-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 64,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d447-7393-b126-d4ff7e7bfe02&quot;,
                    &quot;first_name&quot;: &quot;Tyrell&quot;,
                    &quot;last_name&quot;: &quot;Spinka&quot;,
                    &quot;full_name&quot;: &quot;Tyrell Spinka&quot;,
                    &quot;birth_date&quot;: &quot;1987-09-09T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 66,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d448-7187-ac18-f3457953fdd1&quot;,
                    &quot;first_name&quot;: &quot;Tristian&quot;,
                    &quot;last_name&quot;: &quot;Conn&quot;,
                    &quot;full_name&quot;: &quot;Tristian Conn&quot;,
                    &quot;birth_date&quot;: &quot;1988-05-17T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 52,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d448-7187-ac18-f34579f117c0&quot;,
                    &quot;first_name&quot;: &quot;Bryce&quot;,
                    &quot;last_name&quot;: &quot;Cassin&quot;,
                    &quot;full_name&quot;: &quot;Bryce Cassin&quot;,
                    &quot;birth_date&quot;: &quot;1994-09-17T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 82,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d448-7187-ac18-f3457a3f7162&quot;,
                    &quot;first_name&quot;: &quot;Fidel&quot;,
                    &quot;last_name&quot;: &quot;Walter&quot;,
                    &quot;full_name&quot;: &quot;Fidel Walter&quot;,
                    &quot;birth_date&quot;: &quot;1992-12-28T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 60,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d449-7324-9dd7-d31acd1a889c&quot;,
                    &quot;first_name&quot;: &quot;Dean&quot;,
                    &quot;last_name&quot;: &quot;Mertz&quot;,
                    &quot;full_name&quot;: &quot;Dean Mertz&quot;,
                    &quot;birth_date&quot;: &quot;1987-01-21T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 30,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d449-7324-9dd7-d31acd879f14&quot;,
                    &quot;first_name&quot;: &quot;Clyde&quot;,
                    &quot;last_name&quot;: &quot;Kemmer&quot;,
                    &quot;full_name&quot;: &quot;Clyde Kemmer&quot;,
                    &quot;birth_date&quot;: &quot;1996-03-23T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 71,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44a-71d6-9f22-0d87b6489b0d&quot;,
                    &quot;first_name&quot;: &quot;Haskell&quot;,
                    &quot;last_name&quot;: &quot;Mills&quot;,
                    &quot;full_name&quot;: &quot;Haskell Mills&quot;,
                    &quot;birth_date&quot;: &quot;1986-08-13T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 67,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44a-71d6-9f22-0d87b7141682&quot;,
                    &quot;first_name&quot;: &quot;Cyril&quot;,
                    &quot;last_name&quot;: &quot;Carroll&quot;,
                    &quot;full_name&quot;: &quot;Cyril Carroll&quot;,
                    &quot;birth_date&quot;: &quot;1996-05-26T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 8,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44a-71d6-9f22-0d87b73b1185&quot;,
                    &quot;first_name&quot;: &quot;Art&quot;,
                    &quot;last_name&quot;: &quot;Kris&quot;,
                    &quot;full_name&quot;: &quot;Art Kris&quot;,
                    &quot;birth_date&quot;: &quot;1988-04-17T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 89,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c3e57e05&quot;,
                    &quot;first_name&quot;: &quot;Bennie&quot;,
                    &quot;last_name&quot;: &quot;Dicki&quot;,
                    &quot;full_name&quot;: &quot;Bennie Dicki&quot;,
                    &quot;birth_date&quot;: &quot;2005-04-30T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 19,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
            &quot;name&quot;: &quot;Wilderman LLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
            &quot;first_color&quot;: &quot;#ede232&quot;,
            &quot;second_color&quot;: &quot;#cc3107&quot;,
            &quot;year_of_foundation&quot;: 1922,
            &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d44c-72ea-a3cd-02aaeae4cfe3&quot;,
                    &quot;first_name&quot;: &quot;Brody&quot;,
                    &quot;last_name&quot;: &quot;Wolff&quot;,
                    &quot;full_name&quot;: &quot;Brody Wolff&quot;,
                    &quot;birth_date&quot;: &quot;2003-02-07T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 66,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44c-72ea-a3cd-02aaebb8bd99&quot;,
                    &quot;first_name&quot;: &quot;Zackary&quot;,
                    &quot;last_name&quot;: &quot;Bogan&quot;,
                    &quot;full_name&quot;: &quot;Zackary Bogan&quot;,
                    &quot;birth_date&quot;: &quot;1987-08-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 91,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44d-7262-9f10-99b1db3b35af&quot;,
                    &quot;first_name&quot;: &quot;Alexander&quot;,
                    &quot;last_name&quot;: &quot;Monahan&quot;,
                    &quot;full_name&quot;: &quot;Alexander Monahan&quot;,
                    &quot;birth_date&quot;: &quot;1989-12-25T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 14,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44d-7262-9f10-99b1db668cfd&quot;,
                    &quot;first_name&quot;: &quot;General&quot;,
                    &quot;last_name&quot;: &quot;Gusikowski&quot;,
                    &quot;full_name&quot;: &quot;General Gusikowski&quot;,
                    &quot;birth_date&quot;: &quot;1994-05-05T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 42,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44e-714d-ba0d-857a5b60b052&quot;,
                    &quot;first_name&quot;: &quot;Max&quot;,
                    &quot;last_name&quot;: &quot;Wyman&quot;,
                    &quot;full_name&quot;: &quot;Max Wyman&quot;,
                    &quot;birth_date&quot;: &quot;2004-07-12T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 99,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44e-714d-ba0d-857a5baa3021&quot;,
                    &quot;first_name&quot;: &quot;Dillon&quot;,
                    &quot;last_name&quot;: &quot;Heaney&quot;,
                    &quot;full_name&quot;: &quot;Dillon Heaney&quot;,
                    &quot;birth_date&quot;: &quot;1999-05-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 79,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44e-714d-ba0d-857a5c17c5b2&quot;,
                    &quot;first_name&quot;: &quot;Danny&quot;,
                    &quot;last_name&quot;: &quot;Ziemann&quot;,
                    &quot;full_name&quot;: &quot;Danny Ziemann&quot;,
                    &quot;birth_date&quot;: &quot;1991-05-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 43,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44f-7017-9bbd-06cd5ed5ebaf&quot;,
                    &quot;first_name&quot;: &quot;Broderick&quot;,
                    &quot;last_name&quot;: &quot;Ebert&quot;,
                    &quot;full_name&quot;: &quot;Broderick Ebert&quot;,
                    &quot;birth_date&quot;: &quot;2006-05-11T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 6,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d44f-7017-9bbd-06cd5fc2cfc3&quot;,
                    &quot;first_name&quot;: &quot;Devin&quot;,
                    &quot;last_name&quot;: &quot;Auer&quot;,
                    &quot;full_name&quot;: &quot;Devin Auer&quot;,
                    &quot;birth_date&quot;: &quot;2002-06-07T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 21,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d450-7387-839e-314f4c3160f1&quot;,
                    &quot;first_name&quot;: &quot;Ethan&quot;,
                    &quot;last_name&quot;: &quot;Ernser&quot;,
                    &quot;full_name&quot;: &quot;Ethan Ernser&quot;,
                    &quot;birth_date&quot;: &quot;1994-09-08T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 2,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d450-7387-839e-314f4c6ed0e0&quot;,
                    &quot;first_name&quot;: &quot;Mitchel&quot;,
                    &quot;last_name&quot;: &quot;Torp&quot;,
                    &quot;full_name&quot;: &quot;Mitchel Torp&quot;,
                    &quot;birth_date&quot;: &quot;2006-05-09T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 88,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d451-72fe-bda5-bf06db99addf&quot;,
                    &quot;first_name&quot;: &quot;Henderson&quot;,
                    &quot;last_name&quot;: &quot;Harber&quot;,
                    &quot;full_name&quot;: &quot;Henderson Harber&quot;,
                    &quot;birth_date&quot;: &quot;1986-02-28T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 7,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d451-72fe-bda5-bf06dbbd2a4f&quot;,
                    &quot;first_name&quot;: &quot;Corbin&quot;,
                    &quot;last_name&quot;: &quot;Abernathy&quot;,
                    &quot;full_name&quot;: &quot;Corbin Abernathy&quot;,
                    &quot;birth_date&quot;: &quot;1990-09-15T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 11,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d452-723d-aa45-7e9d419fb43f&quot;,
                    &quot;first_name&quot;: &quot;Brooks&quot;,
                    &quot;last_name&quot;: &quot;Lakin&quot;,
                    &quot;full_name&quot;: &quot;Brooks Lakin&quot;,
                    &quot;birth_date&quot;: &quot;2003-06-28T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 53,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d452-723d-aa45-7e9d41bf9b7c&quot;,
                    &quot;first_name&quot;: &quot;Stevie&quot;,
                    &quot;last_name&quot;: &quot;Huel&quot;,
                    &quot;full_name&quot;: &quot;Stevie Huel&quot;,
                    &quot;birth_date&quot;: &quot;2005-07-14T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 70,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d452-723d-aa45-7e9d428fe96a&quot;,
                    &quot;first_name&quot;: &quot;Ramiro&quot;,
                    &quot;last_name&quot;: &quot;O&#039;Keefe&quot;,
                    &quot;full_name&quot;: &quot;Ramiro O&#039;Keefe&quot;,
                    &quot;birth_date&quot;: &quot;1996-03-10T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 94,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d453-7124-8056-ca7a9c329ee1&quot;,
                    &quot;first_name&quot;: &quot;Noble&quot;,
                    &quot;last_name&quot;: &quot;Collins&quot;,
                    &quot;full_name&quot;: &quot;Noble Collins&quot;,
                    &quot;birth_date&quot;: &quot;1988-06-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 77,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d453-7124-8056-ca7a9ce9bd58&quot;,
                    &quot;first_name&quot;: &quot;Geovanny&quot;,
                    &quot;last_name&quot;: &quot;Murphy&quot;,
                    &quot;full_name&quot;: &quot;Geovanny Murphy&quot;,
                    &quot;birth_date&quot;: &quot;1999-08-19T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 55,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
            &quot;name&quot;: &quot;Mertz LLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
            &quot;first_color&quot;: &quot;#9f45f9&quot;,
            &quot;second_color&quot;: &quot;#171de0&quot;,
            &quot;year_of_foundation&quot;: 1918,
            &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6cca09c3&quot;,
                    &quot;first_name&quot;: &quot;Alfonzo&quot;,
                    &quot;last_name&quot;: &quot;Stiedemann&quot;,
                    &quot;full_name&quot;: &quot;Alfonzo Stiedemann&quot;,
                    &quot;birth_date&quot;: &quot;2005-08-07T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 46,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d455-7121-89ac-1426777247dc&quot;,
                    &quot;first_name&quot;: &quot;Bertram&quot;,
                    &quot;last_name&quot;: &quot;Hayes&quot;,
                    &quot;full_name&quot;: &quot;Bertram Hayes&quot;,
                    &quot;birth_date&quot;: &quot;2004-04-19T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 77,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d455-7121-89ac-1426784dcb6f&quot;,
                    &quot;first_name&quot;: &quot;Salvador&quot;,
                    &quot;last_name&quot;: &quot;Torphy&quot;,
                    &quot;full_name&quot;: &quot;Salvador Torphy&quot;,
                    &quot;birth_date&quot;: &quot;2006-03-26T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 54,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d456-722c-b617-80dcceabffc2&quot;,
                    &quot;first_name&quot;: &quot;Monroe&quot;,
                    &quot;last_name&quot;: &quot;Brakus&quot;,
                    &quot;full_name&quot;: &quot;Monroe Brakus&quot;,
                    &quot;birth_date&quot;: &quot;1994-10-07T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 33,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d456-722c-b617-80dccef88476&quot;,
                    &quot;first_name&quot;: &quot;Perry&quot;,
                    &quot;last_name&quot;: &quot;Nolan&quot;,
                    &quot;full_name&quot;: &quot;Perry Nolan&quot;,
                    &quot;birth_date&quot;: &quot;1996-12-05T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 72,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d457-7205-8488-24a0e5f27fc7&quot;,
                    &quot;first_name&quot;: &quot;Wilfredo&quot;,
                    &quot;last_name&quot;: &quot;Stanton&quot;,
                    &quot;full_name&quot;: &quot;Wilfredo Stanton&quot;,
                    &quot;birth_date&quot;: &quot;2004-08-04T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 85,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d457-7205-8488-24a0e6d429ab&quot;,
                    &quot;first_name&quot;: &quot;Skye&quot;,
                    &quot;last_name&quot;: &quot;Gleason&quot;,
                    &quot;full_name&quot;: &quot;Skye Gleason&quot;,
                    &quot;birth_date&quot;: &quot;2000-01-01T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 17,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d458-73ee-bd21-db7f7a96c60d&quot;,
                    &quot;first_name&quot;: &quot;Cornell&quot;,
                    &quot;last_name&quot;: &quot;Carroll&quot;,
                    &quot;full_name&quot;: &quot;Cornell Carroll&quot;,
                    &quot;birth_date&quot;: &quot;2005-01-23T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 93,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d458-73ee-bd21-db7f7b311188&quot;,
                    &quot;first_name&quot;: &quot;Will&quot;,
                    &quot;last_name&quot;: &quot;Pfannerstill&quot;,
                    &quot;full_name&quot;: &quot;Will Pfannerstill&quot;,
                    &quot;birth_date&quot;: &quot;1990-03-30T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 14,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d458-73ee-bd21-db7f7bc46586&quot;,
                    &quot;first_name&quot;: &quot;Ambrose&quot;,
                    &quot;last_name&quot;: &quot;Mueller&quot;,
                    &quot;full_name&quot;: &quot;Ambrose Mueller&quot;,
                    &quot;birth_date&quot;: &quot;1991-11-12T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 89,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d459-714c-a49b-236f5be312c4&quot;,
                    &quot;first_name&quot;: &quot;Alexys&quot;,
                    &quot;last_name&quot;: &quot;Zemlak&quot;,
                    &quot;full_name&quot;: &quot;Alexys Zemlak&quot;,
                    &quot;birth_date&quot;: &quot;2004-03-23T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 40,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d459-714c-a49b-236f5bfe99d4&quot;,
                    &quot;first_name&quot;: &quot;Estevan&quot;,
                    &quot;last_name&quot;: &quot;Keebler&quot;,
                    &quot;full_name&quot;: &quot;Estevan Keebler&quot;,
                    &quot;birth_date&quot;: &quot;1997-04-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 32,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45a-7350-9ed6-30615ec54a52&quot;,
                    &quot;first_name&quot;: &quot;Jonatan&quot;,
                    &quot;last_name&quot;: &quot;Weimann&quot;,
                    &quot;full_name&quot;: &quot;Jonatan Weimann&quot;,
                    &quot;birth_date&quot;: &quot;1995-10-06T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 51,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45a-7350-9ed6-30615f5443e2&quot;,
                    &quot;first_name&quot;: &quot;Jordon&quot;,
                    &quot;last_name&quot;: &quot;Wilderman&quot;,
                    &quot;full_name&quot;: &quot;Jordon Wilderman&quot;,
                    &quot;birth_date&quot;: &quot;1991-05-31T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 16,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45b-7087-9c41-1fa93775b904&quot;,
                    &quot;first_name&quot;: &quot;Ismael&quot;,
                    &quot;last_name&quot;: &quot;Kassulke&quot;,
                    &quot;full_name&quot;: &quot;Ismael Kassulke&quot;,
                    &quot;birth_date&quot;: &quot;1992-12-30T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 42,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45b-7087-9c41-1fa93791bd6e&quot;,
                    &quot;first_name&quot;: &quot;Hadley&quot;,
                    &quot;last_name&quot;: &quot;Wisoky&quot;,
                    &quot;full_name&quot;: &quot;Hadley Wisoky&quot;,
                    &quot;birth_date&quot;: &quot;1988-05-28T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 71,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45b-7087-9c41-1fa9384d2304&quot;,
                    &quot;first_name&quot;: &quot;Kay&quot;,
                    &quot;last_name&quot;: &quot;Abernathy&quot;,
                    &quot;full_name&quot;: &quot;Kay Abernathy&quot;,
                    &quot;birth_date&quot;: &quot;1989-07-20T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 97,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45c-73e0-9aa3-941f0911ee95&quot;,
                    &quot;first_name&quot;: &quot;Alberto&quot;,
                    &quot;last_name&quot;: &quot;O&#039;Conner&quot;,
                    &quot;full_name&quot;: &quot;Alberto O&#039;Conner&quot;,
                    &quot;birth_date&quot;: &quot;1994-07-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 98,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45c-73e0-9aa3-941f09fe4d84&quot;,
                    &quot;first_name&quot;: &quot;Alek&quot;,
                    &quot;last_name&quot;: &quot;Barrows&quot;,
                    &quot;full_name&quot;: &quot;Alek Barrows&quot;,
                    &quot;birth_date&quot;: &quot;1995-10-12T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 59,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45d-7354-b25d-a92d938878a8&quot;,
                    &quot;first_name&quot;: &quot;Jerod&quot;,
                    &quot;last_name&quot;: &quot;Frami&quot;,
                    &quot;full_name&quot;: &quot;Jerod Frami&quot;,
                    &quot;birth_date&quot;: &quot;1987-03-24T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 8,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45d-7354-b25d-a92d93b64845&quot;,
                    &quot;first_name&quot;: &quot;Kennedi&quot;,
                    &quot;last_name&quot;: &quot;Turcotte&quot;,
                    &quot;full_name&quot;: &quot;Kennedi Turcotte&quot;,
                    &quot;birth_date&quot;: &quot;2006-10-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 81,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
            &quot;name&quot;: &quot;Kuhic LLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
            &quot;first_color&quot;: &quot;#106202&quot;,
            &quot;second_color&quot;: &quot;#933e19&quot;,
            &quot;year_of_foundation&quot;: 1943,
            &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004c26d06&quot;,
                    &quot;first_name&quot;: &quot;Felix&quot;,
                    &quot;last_name&quot;: &quot;Kihn&quot;,
                    &quot;full_name&quot;: &quot;Felix Kihn&quot;,
                    &quot;birth_date&quot;: &quot;2001-07-30T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 81,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b8900595c6e8&quot;,
                    &quot;first_name&quot;: &quot;Heber&quot;,
                    &quot;last_name&quot;: &quot;Corwin&quot;,
                    &quot;full_name&quot;: &quot;Heber Corwin&quot;,
                    &quot;birth_date&quot;: &quot;2007-03-01T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 69,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45f-72d4-8e99-7176f977a526&quot;,
                    &quot;first_name&quot;: &quot;Dion&quot;,
                    &quot;last_name&quot;: &quot;Ondricka&quot;,
                    &quot;full_name&quot;: &quot;Dion Ondricka&quot;,
                    &quot;birth_date&quot;: &quot;1991-08-31T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 82,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d45f-72d4-8e99-7176fa77034c&quot;,
                    &quot;first_name&quot;: &quot;Derek&quot;,
                    &quot;last_name&quot;: &quot;Kovacek&quot;,
                    &quot;full_name&quot;: &quot;Derek Kovacek&quot;,
                    &quot;birth_date&quot;: &quot;1991-07-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 78,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d460-7189-9ce9-bd01736cdbf7&quot;,
                    &quot;first_name&quot;: &quot;Godfrey&quot;,
                    &quot;last_name&quot;: &quot;Toy&quot;,
                    &quot;full_name&quot;: &quot;Godfrey Toy&quot;,
                    &quot;birth_date&quot;: &quot;2001-04-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 16,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d460-7189-9ce9-bd01745b75f4&quot;,
                    &quot;first_name&quot;: &quot;Dewayne&quot;,
                    &quot;last_name&quot;: &quot;Kuhn&quot;,
                    &quot;full_name&quot;: &quot;Dewayne Kuhn&quot;,
                    &quot;birth_date&quot;: &quot;1998-11-12T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 48,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d460-7189-9ce9-bd01748d2ca8&quot;,
                    &quot;first_name&quot;: &quot;Kristopher&quot;,
                    &quot;last_name&quot;: &quot;Vandervort&quot;,
                    &quot;full_name&quot;: &quot;Kristopher Vandervort&quot;,
                    &quot;birth_date&quot;: &quot;1994-07-23T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 32,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d461-72f7-8eeb-3f24c423df82&quot;,
                    &quot;first_name&quot;: &quot;Percy&quot;,
                    &quot;last_name&quot;: &quot;Keebler&quot;,
                    &quot;full_name&quot;: &quot;Percy Keebler&quot;,
                    &quot;birth_date&quot;: &quot;1999-03-29T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 36,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d461-72f7-8eeb-3f24c45c7f37&quot;,
                    &quot;first_name&quot;: &quot;Tristian&quot;,
                    &quot;last_name&quot;: &quot;Haag&quot;,
                    &quot;full_name&quot;: &quot;Tristian Haag&quot;,
                    &quot;birth_date&quot;: &quot;2005-04-06T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 87,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d462-71cd-9678-6058b8b0bc28&quot;,
                    &quot;first_name&quot;: &quot;Nicklaus&quot;,
                    &quot;last_name&quot;: &quot;Schuppe&quot;,
                    &quot;full_name&quot;: &quot;Nicklaus Schuppe&quot;,
                    &quot;birth_date&quot;: &quot;1999-03-31T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 44,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d462-71cd-9678-6058b93025ff&quot;,
                    &quot;first_name&quot;: &quot;Lloyd&quot;,
                    &quot;last_name&quot;: &quot;Klocko&quot;,
                    &quot;full_name&quot;: &quot;Lloyd Klocko&quot;,
                    &quot;birth_date&quot;: &quot;2007-07-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 99,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d462-71cd-9678-6058b9f7b5b9&quot;,
                    &quot;first_name&quot;: &quot;Jaylin&quot;,
                    &quot;last_name&quot;: &quot;Okuneva&quot;,
                    &quot;full_name&quot;: &quot;Jaylin Okuneva&quot;,
                    &quot;birth_date&quot;: &quot;1995-10-20T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 97,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d463-73ae-b9cc-a26da963ccd2&quot;,
                    &quot;first_name&quot;: &quot;Kendall&quot;,
                    &quot;last_name&quot;: &quot;Bogisich&quot;,
                    &quot;full_name&quot;: &quot;Kendall Bogisich&quot;,
                    &quot;birth_date&quot;: &quot;2003-06-01T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 15,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d463-73ae-b9cc-a26da9e07046&quot;,
                    &quot;first_name&quot;: &quot;Jessie&quot;,
                    &quot;last_name&quot;: &quot;Fadel&quot;,
                    &quot;full_name&quot;: &quot;Jessie Fadel&quot;,
                    &quot;birth_date&quot;: &quot;2005-08-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 2,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d464-723b-b287-af237499c8c1&quot;,
                    &quot;first_name&quot;: &quot;Sid&quot;,
                    &quot;last_name&quot;: &quot;Abbott&quot;,
                    &quot;full_name&quot;: &quot;Sid Abbott&quot;,
                    &quot;birth_date&quot;: &quot;1996-10-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 77,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d464-723b-b287-af2374fa8fe6&quot;,
                    &quot;first_name&quot;: &quot;Finn&quot;,
                    &quot;last_name&quot;: &quot;Franecki&quot;,
                    &quot;full_name&quot;: &quot;Finn Franecki&quot;,
                    &quot;birth_date&quot;: &quot;2005-03-26T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 34,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d464-723b-b287-af23758ccdc7&quot;,
                    &quot;first_name&quot;: &quot;Rowan&quot;,
                    &quot;last_name&quot;: &quot;Spencer&quot;,
                    &quot;full_name&quot;: &quot;Rowan Spencer&quot;,
                    &quot;birth_date&quot;: &quot;1986-02-27T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 50,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d465-73b6-ae4f-fdcd3559fe38&quot;,
                    &quot;first_name&quot;: &quot;Tommie&quot;,
                    &quot;last_name&quot;: &quot;Jones&quot;,
                    &quot;full_name&quot;: &quot;Tommie Jones&quot;,
                    &quot;birth_date&quot;: &quot;1998-07-22T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 54,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d465-73b6-ae4f-fdcd35c1cdb9&quot;,
                    &quot;first_name&quot;: &quot;Cary&quot;,
                    &quot;last_name&quot;: &quot;Muller&quot;,
                    &quot;full_name&quot;: &quot;Cary Muller&quot;,
                    &quot;birth_date&quot;: &quot;1998-11-21T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 26,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d466-7247-a066-52ac17d6dfe9&quot;,
                    &quot;first_name&quot;: &quot;Santa&quot;,
                    &quot;last_name&quot;: &quot;Boyer&quot;,
                    &quot;full_name&quot;: &quot;Santa Boyer&quot;,
                    &quot;birth_date&quot;: &quot;1989-12-23T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 73,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d466-7247-a066-52ac1840ce1c&quot;,
                    &quot;first_name&quot;: &quot;Marlin&quot;,
                    &quot;last_name&quot;: &quot;Bruen&quot;,
                    &quot;full_name&quot;: &quot;Marlin Bruen&quot;,
                    &quot;birth_date&quot;: &quot;1994-10-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 70,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d466-7247-a066-52ac18e16607&quot;,
                    &quot;first_name&quot;: &quot;Steve&quot;,
                    &quot;last_name&quot;: &quot;Torp&quot;,
                    &quot;full_name&quot;: &quot;Steve Torp&quot;,
                    &quot;birth_date&quot;: &quot;1991-11-14T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 68,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632ea96fbc50&quot;,
                    &quot;first_name&quot;: &quot;Arno&quot;,
                    &quot;last_name&quot;: &quot;Satterfield&quot;,
                    &quot;full_name&quot;: &quot;Arno Satterfield&quot;,
                    &quot;birth_date&quot;: &quot;2000-12-07T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 66,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
            &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
            &quot;first_color&quot;: &quot;#ae6598&quot;,
            &quot;second_color&quot;: &quot;#715135&quot;,
            &quot;year_of_foundation&quot;: 2012,
            &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d468-728f-b014-21ce48e5d1e1&quot;,
                    &quot;first_name&quot;: &quot;Emmet&quot;,
                    &quot;last_name&quot;: &quot;Bode&quot;,
                    &quot;full_name&quot;: &quot;Emmet Bode&quot;,
                    &quot;birth_date&quot;: &quot;2005-04-15T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 30,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d468-728f-b014-21ce4910c8ba&quot;,
                    &quot;first_name&quot;: &quot;Madyson&quot;,
                    &quot;last_name&quot;: &quot;Bins&quot;,
                    &quot;full_name&quot;: &quot;Madyson Bins&quot;,
                    &quot;birth_date&quot;: &quot;2003-05-07T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 63,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d468-728f-b014-21ce498fc037&quot;,
                    &quot;first_name&quot;: &quot;Marlin&quot;,
                    &quot;last_name&quot;: &quot;Wisoky&quot;,
                    &quot;full_name&quot;: &quot;Marlin Wisoky&quot;,
                    &quot;birth_date&quot;: &quot;2006-09-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 1,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d469-7067-bc9a-b5358725f585&quot;,
                    &quot;first_name&quot;: &quot;Selmer&quot;,
                    &quot;last_name&quot;: &quot;Schroeder&quot;,
                    &quot;full_name&quot;: &quot;Selmer Schroeder&quot;,
                    &quot;birth_date&quot;: &quot;1996-05-14T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 33,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46a-71b8-a513-cc364dbbdd82&quot;,
                    &quot;first_name&quot;: &quot;Maurice&quot;,
                    &quot;last_name&quot;: &quot;Ernser&quot;,
                    &quot;full_name&quot;: &quot;Maurice Ernser&quot;,
                    &quot;birth_date&quot;: &quot;1985-08-11T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 76,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46a-71b8-a513-cc364e7842b3&quot;,
                    &quot;first_name&quot;: &quot;Zane&quot;,
                    &quot;last_name&quot;: &quot;Swift&quot;,
                    &quot;full_name&quot;: &quot;Zane Swift&quot;,
                    &quot;birth_date&quot;: &quot;1987-08-11T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 24,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46a-71b8-a513-cc364f3e96f8&quot;,
                    &quot;first_name&quot;: &quot;Jovanny&quot;,
                    &quot;last_name&quot;: &quot;Macejkovic&quot;,
                    &quot;full_name&quot;: &quot;Jovanny Macejkovic&quot;,
                    &quot;birth_date&quot;: &quot;1999-09-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 91,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46b-7314-bf9d-ed94cadc12ef&quot;,
                    &quot;first_name&quot;: &quot;Stephen&quot;,
                    &quot;last_name&quot;: &quot;Thiel&quot;,
                    &quot;full_name&quot;: &quot;Stephen Thiel&quot;,
                    &quot;birth_date&quot;: &quot;2003-09-14T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 23,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46b-7314-bf9d-ed94cb3eb960&quot;,
                    &quot;first_name&quot;: &quot;Kaley&quot;,
                    &quot;last_name&quot;: &quot;Fay&quot;,
                    &quot;full_name&quot;: &quot;Kaley Fay&quot;,
                    &quot;birth_date&quot;: &quot;2000-03-13T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 2,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46c-7379-a629-eb14eb06978c&quot;,
                    &quot;first_name&quot;: &quot;Clemens&quot;,
                    &quot;last_name&quot;: &quot;Gulgowski&quot;,
                    &quot;full_name&quot;: &quot;Clemens Gulgowski&quot;,
                    &quot;birth_date&quot;: &quot;1992-05-30T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 37,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46c-7379-a629-eb14ebd35bd9&quot;,
                    &quot;first_name&quot;: &quot;Haskell&quot;,
                    &quot;last_name&quot;: &quot;Schowalter&quot;,
                    &quot;full_name&quot;: &quot;Haskell Schowalter&quot;,
                    &quot;birth_date&quot;: &quot;1994-06-22T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 62,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46c-7379-a629-eb14ec9ce35d&quot;,
                    &quot;first_name&quot;: &quot;Cristina&quot;,
                    &quot;last_name&quot;: &quot;Schmidt&quot;,
                    &quot;full_name&quot;: &quot;Cristina Schmidt&quot;,
                    &quot;birth_date&quot;: &quot;1988-07-04T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 65,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46d-7298-9bfe-cd2df905a2b0&quot;,
                    &quot;first_name&quot;: &quot;Johnny&quot;,
                    &quot;last_name&quot;: &quot;Ziemann&quot;,
                    &quot;full_name&quot;: &quot;Johnny Ziemann&quot;,
                    &quot;birth_date&quot;: &quot;1990-01-11T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 89,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46d-7298-9bfe-cd2df99390bb&quot;,
                    &quot;first_name&quot;: &quot;Lance&quot;,
                    &quot;last_name&quot;: &quot;Braun&quot;,
                    &quot;full_name&quot;: &quot;Lance Braun&quot;,
                    &quot;birth_date&quot;: &quot;2003-11-10T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 97,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46d-7298-9bfe-cd2dfa263490&quot;,
                    &quot;first_name&quot;: &quot;Abdullah&quot;,
                    &quot;last_name&quot;: &quot;Ward&quot;,
                    &quot;full_name&quot;: &quot;Abdullah Ward&quot;,
                    &quot;birth_date&quot;: &quot;2001-10-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 7,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46e-7267-a104-0f89735b9478&quot;,
                    &quot;first_name&quot;: &quot;Morris&quot;,
                    &quot;last_name&quot;: &quot;King&quot;,
                    &quot;full_name&quot;: &quot;Morris King&quot;,
                    &quot;birth_date&quot;: &quot;1992-09-04T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 70,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46e-7267-a104-0f89741a0ba0&quot;,
                    &quot;first_name&quot;: &quot;Joaquin&quot;,
                    &quot;last_name&quot;: &quot;Wyman&quot;,
                    &quot;full_name&quot;: &quot;Joaquin Wyman&quot;,
                    &quot;birth_date&quot;: &quot;1993-06-06T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 12,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46f-7134-93d2-a1c6d3fe0d39&quot;,
                    &quot;first_name&quot;: &quot;Zackery&quot;,
                    &quot;last_name&quot;: &quot;Labadie&quot;,
                    &quot;full_name&quot;: &quot;Zackery Labadie&quot;,
                    &quot;birth_date&quot;: &quot;1994-01-27T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 83,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46f-7134-93d2-a1c6d4145187&quot;,
                    &quot;first_name&quot;: &quot;Abdul&quot;,
                    &quot;last_name&quot;: &quot;Haley&quot;,
                    &quot;full_name&quot;: &quot;Abdul Haley&quot;,
                    &quot;birth_date&quot;: &quot;1986-12-27T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 32,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d46f-7134-93d2-a1c6d480ddb0&quot;,
                    &quot;first_name&quot;: &quot;Guillermo&quot;,
                    &quot;last_name&quot;: &quot;Schmidt&quot;,
                    &quot;full_name&quot;: &quot;Guillermo Schmidt&quot;,
                    &quot;birth_date&quot;: &quot;1995-01-09T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 93,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d470-702c-b731-a4647c949c90&quot;,
                    &quot;first_name&quot;: &quot;Louie&quot;,
                    &quot;last_name&quot;: &quot;Willms&quot;,
                    &quot;full_name&quot;: &quot;Louie Willms&quot;,
                    &quot;birth_date&quot;: &quot;2003-03-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 47,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d470-702c-b731-a4647d6b33aa&quot;,
                    &quot;first_name&quot;: &quot;Jarrett&quot;,
                    &quot;last_name&quot;: &quot;Parker&quot;,
                    &quot;full_name&quot;: &quot;Jarrett Parker&quot;,
                    &quot;birth_date&quot;: &quot;1991-07-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 35,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d470-702c-b731-a4647d88ced5&quot;,
                    &quot;first_name&quot;: &quot;Misael&quot;,
                    &quot;last_name&quot;: &quot;Wiza&quot;,
                    &quot;full_name&quot;: &quot;Misael Wiza&quot;,
                    &quot;birth_date&quot;: &quot;2002-01-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 81,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba913e2ae61&quot;,
                    &quot;first_name&quot;: &quot;Durward&quot;,
                    &quot;last_name&quot;: &quot;Abbott&quot;,
                    &quot;full_name&quot;: &quot;Durward Abbott&quot;,
                    &quot;birth_date&quot;: &quot;1998-09-11T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 74,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
            &quot;name&quot;: &quot;Klein-Witting&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
            &quot;first_color&quot;: &quot;#2905d6&quot;,
            &quot;second_color&quot;: &quot;#adb7b7&quot;,
            &quot;year_of_foundation&quot;: 1954,
            &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d472-7399-ad19-4bbe0f10c504&quot;,
                    &quot;first_name&quot;: &quot;Cruz&quot;,
                    &quot;last_name&quot;: &quot;Flatley&quot;,
                    &quot;full_name&quot;: &quot;Cruz Flatley&quot;,
                    &quot;birth_date&quot;: &quot;1987-02-27T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 70,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d472-7399-ad19-4bbe0f834135&quot;,
                    &quot;first_name&quot;: &quot;Vernon&quot;,
                    &quot;last_name&quot;: &quot;Berge&quot;,
                    &quot;full_name&quot;: &quot;Vernon Berge&quot;,
                    &quot;birth_date&quot;: &quot;1990-10-06T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 25,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d473-7224-8d73-06501d921ecc&quot;,
                    &quot;first_name&quot;: &quot;Montana&quot;,
                    &quot;last_name&quot;: &quot;Green&quot;,
                    &quot;full_name&quot;: &quot;Montana Green&quot;,
                    &quot;birth_date&quot;: &quot;1989-06-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 73,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d473-7224-8d73-06501e4e732e&quot;,
                    &quot;first_name&quot;: &quot;Gunner&quot;,
                    &quot;last_name&quot;: &quot;Erdman&quot;,
                    &quot;full_name&quot;: &quot;Gunner Erdman&quot;,
                    &quot;birth_date&quot;: &quot;2002-05-19T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 40,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d473-7224-8d73-06501e5fbeb3&quot;,
                    &quot;first_name&quot;: &quot;Milo&quot;,
                    &quot;last_name&quot;: &quot;Funk&quot;,
                    &quot;full_name&quot;: &quot;Milo Funk&quot;,
                    &quot;birth_date&quot;: &quot;2007-02-24T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 77,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d474-73a7-9f08-146daaaa703a&quot;,
                    &quot;first_name&quot;: &quot;Travon&quot;,
                    &quot;last_name&quot;: &quot;Senger&quot;,
                    &quot;full_name&quot;: &quot;Travon Senger&quot;,
                    &quot;birth_date&quot;: &quot;1992-10-11T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 50,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d474-73a7-9f08-146dab90f02e&quot;,
                    &quot;first_name&quot;: &quot;Amari&quot;,
                    &quot;last_name&quot;: &quot;Donnelly&quot;,
                    &quot;full_name&quot;: &quot;Amari Donnelly&quot;,
                    &quot;birth_date&quot;: &quot;1998-07-21T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 53,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d474-73a7-9f08-146dac36551a&quot;,
                    &quot;first_name&quot;: &quot;Brennon&quot;,
                    &quot;last_name&quot;: &quot;Haag&quot;,
                    &quot;full_name&quot;: &quot;Brennon Haag&quot;,
                    &quot;birth_date&quot;: &quot;1997-04-12T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 58,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d475-72f0-86ff-c2b01208e97e&quot;,
                    &quot;first_name&quot;: &quot;Keshawn&quot;,
                    &quot;last_name&quot;: &quot;Jerde&quot;,
                    &quot;full_name&quot;: &quot;Keshawn Jerde&quot;,
                    &quot;birth_date&quot;: &quot;1985-11-20T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 4,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d475-72f0-86ff-c2b0122367ad&quot;,
                    &quot;first_name&quot;: &quot;Omari&quot;,
                    &quot;last_name&quot;: &quot;Kihn&quot;,
                    &quot;full_name&quot;: &quot;Omari Kihn&quot;,
                    &quot;birth_date&quot;: &quot;2000-06-11T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 13,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d476-733e-970b-894b67ad6ffd&quot;,
                    &quot;first_name&quot;: &quot;Timmothy&quot;,
                    &quot;last_name&quot;: &quot;Smitham&quot;,
                    &quot;full_name&quot;: &quot;Timmothy Smitham&quot;,
                    &quot;birth_date&quot;: &quot;1999-10-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 7,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d476-733e-970b-894b687688c0&quot;,
                    &quot;first_name&quot;: &quot;Josh&quot;,
                    &quot;last_name&quot;: &quot;Hettinger&quot;,
                    &quot;full_name&quot;: &quot;Josh Hettinger&quot;,
                    &quot;birth_date&quot;: &quot;1999-10-06T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 57,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d476-733e-970b-894b68f9e99d&quot;,
                    &quot;first_name&quot;: &quot;Jimmy&quot;,
                    &quot;last_name&quot;: &quot;Mills&quot;,
                    &quot;full_name&quot;: &quot;Jimmy Mills&quot;,
                    &quot;birth_date&quot;: &quot;1995-04-10T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 97,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d477-733c-82bb-74889a3959d7&quot;,
                    &quot;first_name&quot;: &quot;Alexander&quot;,
                    &quot;last_name&quot;: &quot;Weimann&quot;,
                    &quot;full_name&quot;: &quot;Alexander Weimann&quot;,
                    &quot;birth_date&quot;: &quot;2004-01-09T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 75,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d477-733c-82bb-74889af02670&quot;,
                    &quot;first_name&quot;: &quot;Karson&quot;,
                    &quot;last_name&quot;: &quot;Tromp&quot;,
                    &quot;full_name&quot;: &quot;Karson Tromp&quot;,
                    &quot;birth_date&quot;: &quot;1996-10-17T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 20,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d477-733c-82bb-74889b65a5b1&quot;,
                    &quot;first_name&quot;: &quot;Dusty&quot;,
                    &quot;last_name&quot;: &quot;Ullrich&quot;,
                    &quot;full_name&quot;: &quot;Dusty Ullrich&quot;,
                    &quot;birth_date&quot;: &quot;1985-11-10T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 39,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d478-7218-a0bb-a98e9a77b644&quot;,
                    &quot;first_name&quot;: &quot;Dexter&quot;,
                    &quot;last_name&quot;: &quot;Rogahn&quot;,
                    &quot;full_name&quot;: &quot;Dexter Rogahn&quot;,
                    &quot;birth_date&quot;: &quot;1996-03-12T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 19,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d478-7218-a0bb-a98e9afc1d8b&quot;,
                    &quot;first_name&quot;: &quot;Carol&quot;,
                    &quot;last_name&quot;: &quot;Douglas&quot;,
                    &quot;full_name&quot;: &quot;Carol Douglas&quot;,
                    &quot;birth_date&quot;: &quot;1994-06-25T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 30,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d479-73e5-90fb-262af7045965&quot;,
                    &quot;first_name&quot;: &quot;Issac&quot;,
                    &quot;last_name&quot;: &quot;Crona&quot;,
                    &quot;full_name&quot;: &quot;Issac Crona&quot;,
                    &quot;birth_date&quot;: &quot;1991-04-24T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 33,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d479-73e5-90fb-262af7342399&quot;,
                    &quot;first_name&quot;: &quot;Arnold&quot;,
                    &quot;last_name&quot;: &quot;Tillman&quot;,
                    &quot;full_name&quot;: &quot;Arnold Tillman&quot;,
                    &quot;birth_date&quot;: &quot;1998-02-09T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 92,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d479-73e5-90fb-262af758ba6c&quot;,
                    &quot;first_name&quot;: &quot;Reese&quot;,
                    &quot;last_name&quot;: &quot;Graham&quot;,
                    &quot;full_name&quot;: &quot;Reese Graham&quot;,
                    &quot;birth_date&quot;: &quot;1986-12-11T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 74,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47a-72ff-aa6e-35ece7fa2b49&quot;,
                    &quot;first_name&quot;: &quot;Hazle&quot;,
                    &quot;last_name&quot;: &quot;Kessler&quot;,
                    &quot;full_name&quot;: &quot;Hazle Kessler&quot;,
                    &quot;birth_date&quot;: &quot;1996-10-13T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 45,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47a-72ff-aa6e-35ece85a15ec&quot;,
                    &quot;first_name&quot;: &quot;Santa&quot;,
                    &quot;last_name&quot;: &quot;Schultz&quot;,
                    &quot;full_name&quot;: &quot;Santa Schultz&quot;,
                    &quot;birth_date&quot;: &quot;2000-07-09T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 28,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47a-72ff-aa6e-35ece929b788&quot;,
                    &quot;first_name&quot;: &quot;Mohammed&quot;,
                    &quot;last_name&quot;: &quot;Heller&quot;,
                    &quot;full_name&quot;: &quot;Mohammed Heller&quot;,
                    &quot;birth_date&quot;: &quot;1988-12-08T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 12,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4be-737a-aae0-db3b056e4b59&quot;,
                    &quot;first_name&quot;: &quot;Kameron&quot;,
                    &quot;last_name&quot;: &quot;Donnelly&quot;,
                    &quot;full_name&quot;: &quot;Kameron Donnelly&quot;,
                    &quot;birth_date&quot;: &quot;2000-06-17T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 2,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
            &quot;name&quot;: &quot;Marks-Klocko&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
            &quot;first_color&quot;: &quot;#e43395&quot;,
            &quot;second_color&quot;: &quot;#8331bb&quot;,
            &quot;year_of_foundation&quot;: 1956,
            &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a608792f3&quot;,
                    &quot;first_name&quot;: &quot;Domenick&quot;,
                    &quot;last_name&quot;: &quot;Farrell&quot;,
                    &quot;full_name&quot;: &quot;Domenick Farrell&quot;,
                    &quot;birth_date&quot;: &quot;2002-08-28T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 58,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47c-71e8-b573-b6584b3c83eb&quot;,
                    &quot;first_name&quot;: &quot;Elwyn&quot;,
                    &quot;last_name&quot;: &quot;Kreiger&quot;,
                    &quot;full_name&quot;: &quot;Elwyn Kreiger&quot;,
                    &quot;birth_date&quot;: &quot;1996-03-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 83,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47c-71e8-b573-b6584b4b9e38&quot;,
                    &quot;first_name&quot;: &quot;Wilson&quot;,
                    &quot;last_name&quot;: &quot;Wisoky&quot;,
                    &quot;full_name&quot;: &quot;Wilson Wisoky&quot;,
                    &quot;birth_date&quot;: &quot;1990-05-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 1,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47c-71e8-b573-b6584c2d46b3&quot;,
                    &quot;first_name&quot;: &quot;Alberto&quot;,
                    &quot;last_name&quot;: &quot;Wilkinson&quot;,
                    &quot;full_name&quot;: &quot;Alberto Wilkinson&quot;,
                    &quot;birth_date&quot;: &quot;2000-04-25T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 4,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47d-7119-bfc9-6fea1249eaa6&quot;,
                    &quot;first_name&quot;: &quot;Buddy&quot;,
                    &quot;last_name&quot;: &quot;VonRueden&quot;,
                    &quot;full_name&quot;: &quot;Buddy VonRueden&quot;,
                    &quot;birth_date&quot;: &quot;1990-01-22T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 29,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47d-7119-bfc9-6fea127958a1&quot;,
                    &quot;first_name&quot;: &quot;Alfonso&quot;,
                    &quot;last_name&quot;: &quot;Schulist&quot;,
                    &quot;full_name&quot;: &quot;Alfonso Schulist&quot;,
                    &quot;birth_date&quot;: &quot;2005-12-06T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 79,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47d-7119-bfc9-6fea12a794a0&quot;,
                    &quot;first_name&quot;: &quot;Drake&quot;,
                    &quot;last_name&quot;: &quot;Keeling&quot;,
                    &quot;full_name&quot;: &quot;Drake Keeling&quot;,
                    &quot;birth_date&quot;: &quot;1995-07-28T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 42,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47e-71be-bde9-ec34092332a5&quot;,
                    &quot;first_name&quot;: &quot;Brannon&quot;,
                    &quot;last_name&quot;: &quot;Raynor&quot;,
                    &quot;full_name&quot;: &quot;Brannon Raynor&quot;,
                    &quot;birth_date&quot;: &quot;2005-05-31T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 32,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47e-71be-bde9-ec3409aa3061&quot;,
                    &quot;first_name&quot;: &quot;Noah&quot;,
                    &quot;last_name&quot;: &quot;Muller&quot;,
                    &quot;full_name&quot;: &quot;Noah Muller&quot;,
                    &quot;birth_date&quot;: &quot;1992-03-08T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 95,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47e-71be-bde9-ec3409e04f99&quot;,
                    &quot;first_name&quot;: &quot;Miller&quot;,
                    &quot;last_name&quot;: &quot;Cummings&quot;,
                    &quot;full_name&quot;: &quot;Miller Cummings&quot;,
                    &quot;birth_date&quot;: &quot;2006-06-18T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 19,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47f-706c-be2a-1e77872761de&quot;,
                    &quot;first_name&quot;: &quot;Bernard&quot;,
                    &quot;last_name&quot;: &quot;Reichel&quot;,
                    &quot;full_name&quot;: &quot;Bernard Reichel&quot;,
                    &quot;birth_date&quot;: &quot;2003-01-26T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 17,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47f-706c-be2a-1e778733096f&quot;,
                    &quot;first_name&quot;: &quot;Eliezer&quot;,
                    &quot;last_name&quot;: &quot;Stark&quot;,
                    &quot;full_name&quot;: &quot;Eliezer Stark&quot;,
                    &quot;birth_date&quot;: &quot;1990-05-23T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 31,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d47f-706c-be2a-1e77876adece&quot;,
                    &quot;first_name&quot;: &quot;Odell&quot;,
                    &quot;last_name&quot;: &quot;Murray&quot;,
                    &quot;full_name&quot;: &quot;Odell Murray&quot;,
                    &quot;birth_date&quot;: &quot;1997-10-03T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 50,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d480-72e9-a8df-4699e903433e&quot;,
                    &quot;first_name&quot;: &quot;Gunner&quot;,
                    &quot;last_name&quot;: &quot;Harber&quot;,
                    &quot;full_name&quot;: &quot;Gunner Harber&quot;,
                    &quot;birth_date&quot;: &quot;1986-03-01T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 69,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d480-72e9-a8df-4699e961b2a8&quot;,
                    &quot;first_name&quot;: &quot;Wilton&quot;,
                    &quot;last_name&quot;: &quot;Quigley&quot;,
                    &quot;full_name&quot;: &quot;Wilton Quigley&quot;,
                    &quot;birth_date&quot;: &quot;1987-12-09T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 62,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d480-72e9-a8df-4699ea3a4510&quot;,
                    &quot;first_name&quot;: &quot;Joey&quot;,
                    &quot;last_name&quot;: &quot;Morar&quot;,
                    &quot;full_name&quot;: &quot;Joey Morar&quot;,
                    &quot;birth_date&quot;: &quot;1998-12-07T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 38,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d481-73d4-bb41-505e508e0bfe&quot;,
                    &quot;first_name&quot;: &quot;Salvatore&quot;,
                    &quot;last_name&quot;: &quot;Carroll&quot;,
                    &quot;full_name&quot;: &quot;Salvatore Carroll&quot;,
                    &quot;birth_date&quot;: &quot;1997-12-05T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 53,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d481-73d4-bb41-505e513c41a7&quot;,
                    &quot;first_name&quot;: &quot;Esteban&quot;,
                    &quot;last_name&quot;: &quot;Kuhic&quot;,
                    &quot;full_name&quot;: &quot;Esteban Kuhic&quot;,
                    &quot;birth_date&quot;: &quot;1992-08-15T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 92,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d482-70fc-9591-9ca06331b9c8&quot;,
                    &quot;first_name&quot;: &quot;Aric&quot;,
                    &quot;last_name&quot;: &quot;Cummings&quot;,
                    &quot;full_name&quot;: &quot;Aric Cummings&quot;,
                    &quot;birth_date&quot;: &quot;1991-08-08T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 9,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d482-70fc-9591-9ca063c89a81&quot;,
                    &quot;first_name&quot;: &quot;Kareem&quot;,
                    &quot;last_name&quot;: &quot;Runolfsdottir&quot;,
                    &quot;full_name&quot;: &quot;Kareem Runolfsdottir&quot;,
                    &quot;birth_date&quot;: &quot;1996-01-26T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 25,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d482-70fc-9591-9ca063d4597d&quot;,
                    &quot;first_name&quot;: &quot;Macey&quot;,
                    &quot;last_name&quot;: &quot;Walker&quot;,
                    &quot;full_name&quot;: &quot;Macey Walker&quot;,
                    &quot;birth_date&quot;: &quot;1993-05-01T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 59,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d483-7245-8a75-985915894be9&quot;,
                    &quot;first_name&quot;: &quot;Chandler&quot;,
                    &quot;last_name&quot;: &quot;Hickle&quot;,
                    &quot;full_name&quot;: &quot;Chandler Hickle&quot;,
                    &quot;birth_date&quot;: &quot;1988-07-19T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 3,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d483-7245-8a75-985916274c7a&quot;,
                    &quot;first_name&quot;: &quot;Casimer&quot;,
                    &quot;last_name&quot;: &quot;Schoen&quot;,
                    &quot;full_name&quot;: &quot;Casimer Schoen&quot;,
                    &quot;birth_date&quot;: &quot;1989-08-23T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 87,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d483-7245-8a75-9859166d95d1&quot;,
                    &quot;first_name&quot;: &quot;Jalen&quot;,
                    &quot;last_name&quot;: &quot;Kautzer&quot;,
                    &quot;full_name&quot;: &quot;Jalen Kautzer&quot;,
                    &quot;birth_date&quot;: &quot;1989-03-30T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 76,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e0393c7ce&quot;,
                    &quot;first_name&quot;: &quot;Ignatius&quot;,
                    &quot;last_name&quot;: &quot;Lockman&quot;,
                    &quot;full_name&quot;: &quot;Ignatius Lockman&quot;,
                    &quot;birth_date&quot;: &quot;1994-05-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 65,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4c3-719f-b4dc-b7af43793a99&quot;,
                    &quot;first_name&quot;: &quot;Price&quot;,
                    &quot;last_name&quot;: &quot;Goldner&quot;,
                    &quot;full_name&quot;: &quot;Price Goldner&quot;,
                    &quot;birth_date&quot;: &quot;1989-03-05T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 85,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
            &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
            &quot;first_color&quot;: &quot;#5a92e7&quot;,
            &quot;second_color&quot;: &quot;#f2962e&quot;,
            &quot;year_of_foundation&quot;: 1949,
            &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042f479e&quot;,
                    &quot;first_name&quot;: &quot;Dominic&quot;,
                    &quot;last_name&quot;: &quot;Larkin&quot;,
                    &quot;full_name&quot;: &quot;Dominic Larkin&quot;,
                    &quot;birth_date&quot;: &quot;2003-10-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 58,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d485-718e-97a2-2e06e1811e1d&quot;,
                    &quot;first_name&quot;: &quot;Mekhi&quot;,
                    &quot;last_name&quot;: &quot;Schuppe&quot;,
                    &quot;full_name&quot;: &quot;Mekhi Schuppe&quot;,
                    &quot;birth_date&quot;: &quot;2006-07-10T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 30,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d485-718e-97a2-2e06e274a593&quot;,
                    &quot;first_name&quot;: &quot;Gordon&quot;,
                    &quot;last_name&quot;: &quot;Gibson&quot;,
                    &quot;full_name&quot;: &quot;Gordon Gibson&quot;,
                    &quot;birth_date&quot;: &quot;1990-02-14T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 21,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d485-718e-97a2-2e06e35db9fc&quot;,
                    &quot;first_name&quot;: &quot;Broderick&quot;,
                    &quot;last_name&quot;: &quot;Nicolas&quot;,
                    &quot;full_name&quot;: &quot;Broderick Nicolas&quot;,
                    &quot;birth_date&quot;: &quot;2003-09-04T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 11,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d486-7022-aacc-3782d848aa66&quot;,
                    &quot;first_name&quot;: &quot;Danial&quot;,
                    &quot;last_name&quot;: &quot;Connelly&quot;,
                    &quot;full_name&quot;: &quot;Danial Connelly&quot;,
                    &quot;birth_date&quot;: &quot;1989-11-23T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 39,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d486-7022-aacc-3782d85a851e&quot;,
                    &quot;first_name&quot;: &quot;Abdullah&quot;,
                    &quot;last_name&quot;: &quot;Feest&quot;,
                    &quot;full_name&quot;: &quot;Abdullah Feest&quot;,
                    &quot;birth_date&quot;: &quot;1994-03-11T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 63,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d486-7022-aacc-3782d8b53f43&quot;,
                    &quot;first_name&quot;: &quot;Cade&quot;,
                    &quot;last_name&quot;: &quot;Greenfelder&quot;,
                    &quot;full_name&quot;: &quot;Cade Greenfelder&quot;,
                    &quot;birth_date&quot;: &quot;1989-04-10T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 54,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d487-70d5-9c51-ae68e35243f2&quot;,
                    &quot;first_name&quot;: &quot;Noel&quot;,
                    &quot;last_name&quot;: &quot;Konopelski&quot;,
                    &quot;full_name&quot;: &quot;Noel Konopelski&quot;,
                    &quot;birth_date&quot;: &quot;2006-05-07T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 93,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d487-70d5-9c51-ae68e3e76c5b&quot;,
                    &quot;first_name&quot;: &quot;Lawson&quot;,
                    &quot;last_name&quot;: &quot;Kemmer&quot;,
                    &quot;full_name&quot;: &quot;Lawson Kemmer&quot;,
                    &quot;birth_date&quot;: &quot;1994-02-01T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 44,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d487-70d5-9c51-ae68e47f7498&quot;,
                    &quot;first_name&quot;: &quot;Casey&quot;,
                    &quot;last_name&quot;: &quot;Hoppe&quot;,
                    &quot;full_name&quot;: &quot;Casey Hoppe&quot;,
                    &quot;birth_date&quot;: &quot;1993-09-28T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 33,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d488-7246-870d-a8d585136cca&quot;,
                    &quot;first_name&quot;: &quot;Henderson&quot;,
                    &quot;last_name&quot;: &quot;Hessel&quot;,
                    &quot;full_name&quot;: &quot;Henderson Hessel&quot;,
                    &quot;birth_date&quot;: &quot;2007-06-24T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 32,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d488-7246-870d-a8d585194b5f&quot;,
                    &quot;first_name&quot;: &quot;Jayce&quot;,
                    &quot;last_name&quot;: &quot;Davis&quot;,
                    &quot;full_name&quot;: &quot;Jayce Davis&quot;,
                    &quot;birth_date&quot;: &quot;1999-02-12T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 34,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d488-7246-870d-a8d58549d917&quot;,
                    &quot;first_name&quot;: &quot;Paxton&quot;,
                    &quot;last_name&quot;: &quot;Roberts&quot;,
                    &quot;full_name&quot;: &quot;Paxton Roberts&quot;,
                    &quot;birth_date&quot;: &quot;2001-07-30T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 2,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d489-705f-8fd0-ef7c83d5ef11&quot;,
                    &quot;first_name&quot;: &quot;Cortez&quot;,
                    &quot;last_name&quot;: &quot;Dicki&quot;,
                    &quot;full_name&quot;: &quot;Cortez Dicki&quot;,
                    &quot;birth_date&quot;: &quot;1997-07-26T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 75,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d489-705f-8fd0-ef7c8411980f&quot;,
                    &quot;first_name&quot;: &quot;Humberto&quot;,
                    &quot;last_name&quot;: &quot;Langworth&quot;,
                    &quot;full_name&quot;: &quot;Humberto Langworth&quot;,
                    &quot;birth_date&quot;: &quot;1991-06-12T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 16,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d489-705f-8fd0-ef7c84deaeb7&quot;,
                    &quot;first_name&quot;: &quot;Ambrose&quot;,
                    &quot;last_name&quot;: &quot;Morissette&quot;,
                    &quot;full_name&quot;: &quot;Ambrose Morissette&quot;,
                    &quot;birth_date&quot;: &quot;1997-06-25T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 91,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d48a-7098-b7f4-e31dc6ce5f95&quot;,
                    &quot;first_name&quot;: &quot;Fred&quot;,
                    &quot;last_name&quot;: &quot;Denesik&quot;,
                    &quot;full_name&quot;: &quot;Fred Denesik&quot;,
                    &quot;birth_date&quot;: &quot;2006-12-27T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 88,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d48a-7098-b7f4-e31dc70a57db&quot;,
                    &quot;first_name&quot;: &quot;Darwin&quot;,
                    &quot;last_name&quot;: &quot;Thompson&quot;,
                    &quot;full_name&quot;: &quot;Darwin Thompson&quot;,
                    &quot;birth_date&quot;: &quot;2001-07-23T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 45,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d48a-7098-b7f4-e31dc724be9a&quot;,
                    &quot;first_name&quot;: &quot;Robbie&quot;,
                    &quot;last_name&quot;: &quot;King&quot;,
                    &quot;full_name&quot;: &quot;Robbie King&quot;,
                    &quot;birth_date&quot;: &quot;1994-08-17T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 20,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d48b-7224-bd80-068e355b295b&quot;,
                    &quot;first_name&quot;: &quot;Fritz&quot;,
                    &quot;last_name&quot;: &quot;Bins&quot;,
                    &quot;full_name&quot;: &quot;Fritz Bins&quot;,
                    &quot;birth_date&quot;: &quot;2005-08-10T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 1,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d48b-7224-bd80-068e364998d4&quot;,
                    &quot;first_name&quot;: &quot;Boris&quot;,
                    &quot;last_name&quot;: &quot;Hills&quot;,
                    &quot;full_name&quot;: &quot;Boris Hills&quot;,
                    &quot;birth_date&quot;: &quot;2005-11-08T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 24,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d48c-705b-81cf-afde8ac34699&quot;,
                    &quot;first_name&quot;: &quot;Winston&quot;,
                    &quot;last_name&quot;: &quot;Hamill&quot;,
                    &quot;full_name&quot;: &quot;Winston Hamill&quot;,
                    &quot;birth_date&quot;: &quot;2004-11-10T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 59,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d48c-705b-81cf-afde8b0d4451&quot;,
                    &quot;first_name&quot;: &quot;Jerrod&quot;,
                    &quot;last_name&quot;: &quot;Cartwright&quot;,
                    &quot;full_name&quot;: &quot;Jerrod Cartwright&quot;,
                    &quot;birth_date&quot;: &quot;2000-01-19T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 10,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d48c-705b-81cf-afde8b7a0bc4&quot;,
                    &quot;first_name&quot;: &quot;Trystan&quot;,
                    &quot;last_name&quot;: &quot;Keebler&quot;,
                    &quot;full_name&quot;: &quot;Trystan Keebler&quot;,
                    &quot;birth_date&quot;: &quot;2005-08-04T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 70,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d48d-732a-aeab-d47d607362bf&quot;,
                    &quot;first_name&quot;: &quot;General&quot;,
                    &quot;last_name&quot;: &quot;Hyatt&quot;,
                    &quot;full_name&quot;: &quot;General Hyatt&quot;,
                    &quot;birth_date&quot;: &quot;1988-06-07T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 15,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd894ffb02d1&quot;,
            &quot;name&quot;: &quot;Blick LLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009966?text=sports+voluptas&quot;,
            &quot;first_color&quot;: &quot;#21f7a6&quot;,
            &quot;second_color&quot;: &quot;#22abdd&quot;,
            &quot;year_of_foundation&quot;: 1959,
            &quot;stadium&quot;: &quot;Daughertyhaven Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4c2-72ca-a5a7-b35f6f92dcb4&quot;,
                    &quot;first_name&quot;: &quot;Efrain&quot;,
                    &quot;last_name&quot;: &quot;Emmerich&quot;,
                    &quot;full_name&quot;: &quot;Efrain Emmerich&quot;,
                    &quot;birth_date&quot;: &quot;2002-04-17T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 26,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd895081f4c2&quot;,
            &quot;name&quot;: &quot;Effertz PLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066ff?text=sports+odit&quot;,
            &quot;first_color&quot;: &quot;#9ab8d1&quot;,
            &quot;second_color&quot;: &quot;#39b0a0&quot;,
            &quot;year_of_foundation&quot;: 1983,
            &quot;stadium&quot;: &quot;Mohamedport Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd8950fae5b9&quot;,
            &quot;name&quot;: &quot;Hoeger, Botsford and Emmerich&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eeaa?text=sports+aliquid&quot;,
            &quot;first_color&quot;: &quot;#de10f0&quot;,
            &quot;second_color&quot;: &quot;#c2ad85&quot;,
            &quot;year_of_foundation&quot;: 1904,
            &quot;stadium&quot;: &quot;Lake Jacintoside Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe0586ace&quot;,
            &quot;name&quot;: &quot;Roob-Crooks&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aabb?text=sports+eveniet&quot;,
            &quot;first_color&quot;: &quot;#cc23e9&quot;,
            &quot;second_color&quot;: &quot;#728357&quot;,
            &quot;year_of_foundation&quot;: 2021,
            &quot;stadium&quot;: &quot;Irwinfort Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe086cb55&quot;,
            &quot;name&quot;: &quot;Marquardt Ltd&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077aa?text=sports+ea&quot;,
            &quot;first_color&quot;: &quot;#e8a05e&quot;,
            &quot;second_color&quot;: &quot;#ec907a&quot;,
            &quot;year_of_foundation&quot;: 2005,
            &quot;stadium&quot;: &quot;Pollichfort Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe13f297d&quot;,
            &quot;name&quot;: &quot;Flatley, Altenwerth and Bins&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa11?text=sports+est&quot;,
            &quot;first_color&quot;: &quot;#273916&quot;,
            &quot;second_color&quot;: &quot;#15d0ad&quot;,
            &quot;year_of_foundation&quot;: 1961,
            &quot;stadium&quot;: &quot;Port Vadaport Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe15eed18&quot;,
            &quot;name&quot;: &quot;Schimmel, Block and D&#039;Amore&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ddbb?text=sports+at&quot;,
            &quot;first_color&quot;: &quot;#01b921&quot;,
            &quot;second_color&quot;: &quot;#7d4047&quot;,
            &quot;year_of_foundation&quot;: 1900,
            &quot;stadium&quot;: &quot;East Arnaldofort Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4bb-731b-b1c5-c622eec9c1dc&quot;,
                    &quot;first_name&quot;: &quot;Johathan&quot;,
                    &quot;last_name&quot;: &quot;Labadie&quot;,
                    &quot;full_name&quot;: &quot;Johathan Labadie&quot;,
                    &quot;birth_date&quot;: &quot;1996-06-13T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 36,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe1ec0509&quot;,
            &quot;name&quot;: &quot;Schmidt-Jones&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0099dd?text=sports+eius&quot;,
            &quot;first_color&quot;: &quot;#f85802&quot;,
            &quot;second_color&quot;: &quot;#8bbd6e&quot;,
            &quot;year_of_foundation&quot;: 1951,
            &quot;stadium&quot;: &quot;Port Suzanne Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4b6-7006-a726-1eb0eb2ed079&quot;,
                    &quot;first_name&quot;: &quot;Hans&quot;,
                    &quot;last_name&quot;: &quot;Kub&quot;,
                    &quot;full_name&quot;: &quot;Hans Kub&quot;,
                    &quot;birth_date&quot;: &quot;1987-09-10T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 61,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e7289f18f&quot;,
            &quot;name&quot;: &quot;Kris-Schmidt&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eecc?text=sports+quos&quot;,
            &quot;first_color&quot;: &quot;#3b4a0e&quot;,
            &quot;second_color&quot;: &quot;#e5981e&quot;,
            &quot;year_of_foundation&quot;: 1946,
            &quot;stadium&quot;: &quot;Robynview Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4c5-7174-8a62-22d4d01bb091&quot;,
                    &quot;first_name&quot;: &quot;Saige&quot;,
                    &quot;last_name&quot;: &quot;McGlynn&quot;,
                    &quot;full_name&quot;: &quot;Saige McGlynn&quot;,
                    &quot;birth_date&quot;: &quot;1991-09-13T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 25,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e73174ce8&quot;,
            &quot;name&quot;: &quot;Schoen Inc&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ff55?text=sports+et&quot;,
            &quot;first_color&quot;: &quot;#2d9cfe&quot;,
            &quot;second_color&quot;: &quot;#8df426&quot;,
            &quot;year_of_foundation&quot;: 1960,
            &quot;stadium&quot;: &quot;Angusburgh Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e73b10df0&quot;,
            &quot;name&quot;: &quot;Runolfsson, Miller and Kris&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066cc?text=sports+modi&quot;,
            &quot;first_color&quot;: &quot;#7087e7&quot;,
            &quot;second_color&quot;: &quot;#8e3431&quot;,
            &quot;year_of_foundation&quot;: 1902,
            &quot;stadium&quot;: &quot;Catalinaborough Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065b368d8b&quot;,
            &quot;name&quot;: &quot;Huel, Schaefer and Heller&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ee00?text=sports+quisquam&quot;,
            &quot;first_color&quot;: &quot;#bb909f&quot;,
            &quot;second_color&quot;: &quot;#b37ec1&quot;,
            &quot;year_of_foundation&quot;: 1988,
            &quot;stadium&quot;: &quot;Devenmouth Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065b38117c&quot;,
            &quot;name&quot;: &quot;Fisher-Daugherty&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008822?text=sports+perferendis&quot;,
            &quot;first_color&quot;: &quot;#bd17c2&quot;,
            &quot;second_color&quot;: &quot;#3270cb&quot;,
            &quot;year_of_foundation&quot;: 1905,
            &quot;stadium&quot;: &quot;Marionbury Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d495-70d5-96e8-e4065bd50bba&quot;,
            &quot;name&quot;: &quot;Auer Inc&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/007733?text=sports+est&quot;,
            &quot;first_color&quot;: &quot;#c8543a&quot;,
            &quot;second_color&quot;: &quot;#7d33e3&quot;,
            &quot;year_of_foundation&quot;: 1931,
            &quot;stadium&quot;: &quot;Smithhaven Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49b-7118-b930-594a3d779423&quot;,
            &quot;name&quot;: &quot;White Ltd&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008811?text=sports+animi&quot;,
            &quot;first_color&quot;: &quot;#b6d5f4&quot;,
            &quot;second_color&quot;: &quot;#56fab9&quot;,
            &quot;year_of_foundation&quot;: 1923,
            &quot;stadium&quot;: &quot;West Garrick Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49b-7118-b930-594a3de22fb5&quot;,
            &quot;name&quot;: &quot;Greenholt, Steuber and Wintheiser&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/001166?text=sports+vel&quot;,
            &quot;first_color&quot;: &quot;#8eff30&quot;,
            &quot;second_color&quot;: &quot;#8918e1&quot;,
            &quot;year_of_foundation&quot;: 1942,
            &quot;stadium&quot;: &quot;Port Clairberg Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49b-7118-b930-594a3e7987ff&quot;,
            &quot;name&quot;: &quot;Block, Harris and Bode&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ccdd?text=sports+dolore&quot;,
            &quot;first_color&quot;: &quot;#651451&quot;,
            &quot;second_color&quot;: &quot;#aa888e&quot;,
            &quot;year_of_foundation&quot;: 1919,
            &quot;stadium&quot;: &quot;Stantonberg Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49b-7118-b930-594a3e7dcdc5&quot;,
            &quot;name&quot;: &quot;Schroeder-Green&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008899?text=sports+reiciendis&quot;,
            &quot;first_color&quot;: &quot;#f61e4f&quot;,
            &quot;second_color&quot;: &quot;#2556b7&quot;,
            &quot;year_of_foundation&quot;: 1918,
            &quot;stadium&quot;: &quot;Lake Wilton Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4c4-7005-9348-37b9ce75bec2&quot;,
                    &quot;first_name&quot;: &quot;Keegan&quot;,
                    &quot;last_name&quot;: &quot;Hill&quot;,
                    &quot;full_name&quot;: &quot;Keegan Hill&quot;,
                    &quot;birth_date&quot;: &quot;1987-10-22T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 31,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49c-72f4-931a-ad3f240a41d3&quot;,
            &quot;name&quot;: &quot;Schoen-Mayert&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066dd?text=sports+ut&quot;,
            &quot;first_color&quot;: &quot;#9eea10&quot;,
            &quot;second_color&quot;: &quot;#5d29a2&quot;,
            &quot;year_of_foundation&quot;: 2013,
            &quot;stadium&quot;: &quot;Mabelton Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49c-72f4-931a-ad3f243d444d&quot;,
            &quot;name&quot;: &quot;Hagenes-Farrell&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc11?text=sports+quidem&quot;,
            &quot;first_color&quot;: &quot;#4db86d&quot;,
            &quot;second_color&quot;: &quot;#80efd0&quot;,
            &quot;year_of_foundation&quot;: 1910,
            &quot;stadium&quot;: &quot;East Curt Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4c4-7005-9348-37b9cf53cf59&quot;,
                    &quot;first_name&quot;: &quot;Daren&quot;,
                    &quot;last_name&quot;: &quot;Goldner&quot;,
                    &quot;full_name&quot;: &quot;Daren Goldner&quot;,
                    &quot;birth_date&quot;: &quot;2004-12-20T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 50,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49c-72f4-931a-ad3f24d9e774&quot;,
            &quot;name&quot;: &quot;Christiansen, Bernier and Stroman&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066bb?text=sports+enim&quot;,
            &quot;first_color&quot;: &quot;#68b67e&quot;,
            &quot;second_color&quot;: &quot;#aa58b0&quot;,
            &quot;year_of_foundation&quot;: 2023,
            &quot;stadium&quot;: &quot;New Elsa Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49c-72f4-931a-ad3f251dcb17&quot;,
            &quot;name&quot;: &quot;Yundt-Hammes&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/007788?text=sports+ea&quot;,
            &quot;first_color&quot;: &quot;#b06d06&quot;,
            &quot;second_color&quot;: &quot;#9b8994&quot;,
            &quot;year_of_foundation&quot;: 2013,
            &quot;stadium&quot;: &quot;Mayertfort Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49d-704b-a924-77f0121f54b8&quot;,
            &quot;name&quot;: &quot;Veum, Lakin and Bayer&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd77?text=sports+et&quot;,
            &quot;first_color&quot;: &quot;#af3961&quot;,
            &quot;second_color&quot;: &quot;#e51992&quot;,
            &quot;year_of_foundation&quot;: 1929,
            &quot;stadium&quot;: &quot;Rafaelachester Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49d-704b-a924-77f012cea5b5&quot;,
            &quot;name&quot;: &quot;Hartmann, Balistreri and Crist&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+sint&quot;,
            &quot;first_color&quot;: &quot;#214642&quot;,
            &quot;second_color&quot;: &quot;#3e609e&quot;,
            &quot;year_of_foundation&quot;: 1952,
            &quot;stadium&quot;: &quot;Batzton Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4b8-71a6-8aac-5ebb07030962&quot;,
                    &quot;first_name&quot;: &quot;Neal&quot;,
                    &quot;last_name&quot;: &quot;Nienow&quot;,
                    &quot;full_name&quot;: &quot;Neal Nienow&quot;,
                    &quot;birth_date&quot;: &quot;2000-08-30T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 81,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4c1-7274-8029-7b9b74c2c7ee&quot;,
                    &quot;first_name&quot;: &quot;Glennie&quot;,
                    &quot;last_name&quot;: &quot;Weissnat&quot;,
                    &quot;full_name&quot;: &quot;Glennie Weissnat&quot;,
                    &quot;birth_date&quot;: &quot;2006-02-19T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 64,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49d-704b-a924-77f012e9067f&quot;,
            &quot;name&quot;: &quot;Beahan, Mitchell and Adams&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004411?text=sports+aliquid&quot;,
            &quot;first_color&quot;: &quot;#77a692&quot;,
            &quot;second_color&quot;: &quot;#543a69&quot;,
            &quot;year_of_foundation&quot;: 1939,
            &quot;stadium&quot;: &quot;Stanton Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4bd-72b6-aa4a-9ef7bfc56acb&quot;,
                    &quot;first_name&quot;: &quot;Floy&quot;,
                    &quot;last_name&quot;: &quot;Koepp&quot;,
                    &quot;full_name&quot;: &quot;Floy Koepp&quot;,
                    &quot;birth_date&quot;: &quot;2000-06-04T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 44,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49d-704b-a924-77f013666cfe&quot;,
            &quot;name&quot;: &quot;Emmerich, Carter and Block&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/005544?text=sports+hic&quot;,
            &quot;first_color&quot;: &quot;#5a7bb3&quot;,
            &quot;second_color&quot;: &quot;#23bde4&quot;,
            &quot;year_of_foundation&quot;: 1972,
            &quot;stadium&quot;: &quot;Lake Gregoriobury Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49e-70f9-adb5-ed710013113b&quot;,
            &quot;name&quot;: &quot;Raynor, Kshlerin and Schmidt&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+cupiditate&quot;,
            &quot;first_color&quot;: &quot;#0289f3&quot;,
            &quot;second_color&quot;: &quot;#4acd06&quot;,
            &quot;year_of_foundation&quot;: 1906,
            &quot;stadium&quot;: &quot;Sengerport Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49e-70f9-adb5-ed71010e7318&quot;,
            &quot;name&quot;: &quot;Ratke PLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbee?text=sports+itaque&quot;,
            &quot;first_color&quot;: &quot;#784a7a&quot;,
            &quot;second_color&quot;: &quot;#17ff14&quot;,
            &quot;year_of_foundation&quot;: 1932,
            &quot;stadium&quot;: &quot;West Pattiestad Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d49e-70f9-adb5-ed71014b7a30&quot;,
            &quot;name&quot;: &quot;Schmidt Inc&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088ff?text=sports+quas&quot;,
            &quot;first_color&quot;: &quot;#05cfa9&quot;,
            &quot;second_color&quot;: &quot;#d2d82f&quot;,
            &quot;year_of_foundation&quot;: 1910,
            &quot;stadium&quot;: &quot;Koeppmouth Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a1-7088-be69-ee5354ac9370&quot;,
            &quot;name&quot;: &quot;Corwin LLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/002277?text=sports+commodi&quot;,
            &quot;first_color&quot;: &quot;#5b8dcc&quot;,
            &quot;second_color&quot;: &quot;#f0509b&quot;,
            &quot;year_of_foundation&quot;: 1994,
            &quot;stadium&quot;: &quot;Port Dorthy Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a1-7088-be69-ee53552f5761&quot;,
            &quot;name&quot;: &quot;Kub, Marks and O&#039;Keefe&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/002200?text=sports+aspernatur&quot;,
            &quot;first_color&quot;: &quot;#ca4e93&quot;,
            &quot;second_color&quot;: &quot;#c42096&quot;,
            &quot;year_of_foundation&quot;: 1925,
            &quot;stadium&quot;: &quot;East Marjolaine Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a1-7088-be69-ee535629d4eb&quot;,
            &quot;name&quot;: &quot;Beatty Group&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088bb?text=sports+numquam&quot;,
            &quot;first_color&quot;: &quot;#3d123e&quot;,
            &quot;second_color&quot;: &quot;#1b6918&quot;,
            &quot;year_of_foundation&quot;: 1987,
            &quot;stadium&quot;: &quot;Cieloview Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a2-70a5-927e-7ff99e47996c&quot;,
            &quot;name&quot;: &quot;Koepp, Ruecker and Greenfelder&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006655?text=sports+labore&quot;,
            &quot;first_color&quot;: &quot;#538570&quot;,
            &quot;second_color&quot;: &quot;#4d43d7&quot;,
            &quot;year_of_foundation&quot;: 2002,
            &quot;stadium&quot;: &quot;Lake Maegan Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a2-70a5-927e-7ff99e584630&quot;,
            &quot;name&quot;: &quot;O&#039;Keefe, Kreiger and Kessler&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011ee?text=sports+tempora&quot;,
            &quot;first_color&quot;: &quot;#c2b05e&quot;,
            &quot;second_color&quot;: &quot;#09511f&quot;,
            &quot;year_of_foundation&quot;: 1995,
            &quot;stadium&quot;: &quot;Port Kirstin Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4ba-72ac-b0df-0c435bf2f2c9&quot;,
                    &quot;first_name&quot;: &quot;Brenden&quot;,
                    &quot;last_name&quot;: &quot;Nitzsche&quot;,
                    &quot;full_name&quot;: &quot;Brenden Nitzsche&quot;,
                    &quot;birth_date&quot;: &quot;1994-05-14T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 9,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4bf-7121-9c35-502fbd5c17b5&quot;,
                    &quot;first_name&quot;: &quot;Willard&quot;,
                    &quot;last_name&quot;: &quot;Anderson&quot;,
                    &quot;full_name&quot;: &quot;Willard Anderson&quot;,
                    &quot;birth_date&quot;: &quot;1996-07-27T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 80,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a2-70a5-927e-7ff99f2edea1&quot;,
            &quot;name&quot;: &quot;Adams LLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0000ee?text=sports+enim&quot;,
            &quot;first_color&quot;: &quot;#3fadd0&quot;,
            &quot;second_color&quot;: &quot;#468642&quot;,
            &quot;year_of_foundation&quot;: 1997,
            &quot;stadium&quot;: &quot;Osbaldoberg Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4bb-731b-b1c5-c622ef3e5205&quot;,
                    &quot;first_name&quot;: &quot;Soledad&quot;,
                    &quot;last_name&quot;: &quot;Prosacco&quot;,
                    &quot;full_name&quot;: &quot;Soledad Prosacco&quot;,
                    &quot;birth_date&quot;: &quot;1998-02-17T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 42,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a3-7249-9e67-75ec170617ae&quot;,
            &quot;name&quot;: &quot;Koelpin-Rau&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ff44?text=sports+vel&quot;,
            &quot;first_color&quot;: &quot;#e75c67&quot;,
            &quot;second_color&quot;: &quot;#6e9593&quot;,
            &quot;year_of_foundation&quot;: 1943,
            &quot;stadium&quot;: &quot;East Jamar Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a3-7249-9e67-75ec170f4edd&quot;,
            &quot;name&quot;: &quot;Morar Group&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb55?text=sports+iste&quot;,
            &quot;first_color&quot;: &quot;#a6cf6b&quot;,
            &quot;second_color&quot;: &quot;#c0cbcf&quot;,
            &quot;year_of_foundation&quot;: 2013,
            &quot;stadium&quot;: &quot;Schustertown Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4b7-7163-bf96-87178e48ddda&quot;,
                    &quot;first_name&quot;: &quot;Austen&quot;,
                    &quot;last_name&quot;: &quot;Collins&quot;,
                    &quot;full_name&quot;: &quot;Austen Collins&quot;,
                    &quot;birth_date&quot;: &quot;2005-03-07T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 78,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a3-7249-9e67-75ec173f092c&quot;,
            &quot;name&quot;: &quot;Cassin, Schultz and Douglas&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa88?text=sports+eos&quot;,
            &quot;first_color&quot;: &quot;#88fe39&quot;,
            &quot;second_color&quot;: &quot;#c199cb&quot;,
            &quot;year_of_foundation&quot;: 1953,
            &quot;stadium&quot;: &quot;Yazminberg Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a4-7359-8396-f57328bfc7fc&quot;,
            &quot;name&quot;: &quot;Dickinson Inc&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbee?text=sports+et&quot;,
            &quot;first_color&quot;: &quot;#48bc32&quot;,
            &quot;second_color&quot;: &quot;#55b495&quot;,
            &quot;year_of_foundation&quot;: 2001,
            &quot;stadium&quot;: &quot;Lake Dianna Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a4-7359-8396-f5732979bbae&quot;,
            &quot;name&quot;: &quot;Daugherty Group&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004488?text=sports+incidunt&quot;,
            &quot;first_color&quot;: &quot;#473d0b&quot;,
            &quot;second_color&quot;: &quot;#44418c&quot;,
            &quot;year_of_foundation&quot;: 1967,
            &quot;stadium&quot;: &quot;Gerlachville Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4c1-7274-8029-7b9b746aa6ab&quot;,
                    &quot;first_name&quot;: &quot;Columbus&quot;,
                    &quot;last_name&quot;: &quot;DuBuque&quot;,
                    &quot;full_name&quot;: &quot;Columbus DuBuque&quot;,
                    &quot;birth_date&quot;: &quot;2005-01-31T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 30,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a4-7359-8396-f5732a119aa9&quot;,
            &quot;name&quot;: &quot;Stokes Inc&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/000044?text=sports+vel&quot;,
            &quot;first_color&quot;: &quot;#377589&quot;,
            &quot;second_color&quot;: &quot;#709148&quot;,
            &quot;year_of_foundation&quot;: 1923,
            &quot;stadium&quot;: &quot;South Webster Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a4-7359-8396-f5732a196158&quot;,
            &quot;name&quot;: &quot;Olson-Bashirian&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066ee?text=sports+vero&quot;,
            &quot;first_color&quot;: &quot;#7b6611&quot;,
            &quot;second_color&quot;: &quot;#31f1a0&quot;,
            &quot;year_of_foundation&quot;: 2021,
            &quot;stadium&quot;: &quot;Carterside Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4b6-7006-a726-1eb0ec0f12f1&quot;,
                    &quot;first_name&quot;: &quot;Josiah&quot;,
                    &quot;last_name&quot;: &quot;Brakus&quot;,
                    &quot;full_name&quot;: &quot;Josiah Brakus&quot;,
                    &quot;birth_date&quot;: &quot;1997-02-02T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 54,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a5-7316-9795-4acc42d095da&quot;,
            &quot;name&quot;: &quot;Terry Ltd&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc33?text=sports+modi&quot;,
            &quot;first_color&quot;: &quot;#b12c99&quot;,
            &quot;second_color&quot;: &quot;#66da30&quot;,
            &quot;year_of_foundation&quot;: 1973,
            &quot;stadium&quot;: &quot;North Everardo Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a5-7316-9795-4acc430b66f3&quot;,
            &quot;name&quot;: &quot;Pfannerstill Ltd&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088cc?text=sports+expedita&quot;,
            &quot;first_color&quot;: &quot;#789791&quot;,
            &quot;second_color&quot;: &quot;#34a4bd&quot;,
            &quot;year_of_foundation&quot;: 1938,
            &quot;stadium&quot;: &quot;Milliefort Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a8-7284-9497-dd0ff1f45d63&quot;,
            &quot;name&quot;: &quot;Buckridge LLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ddaa?text=sports+magni&quot;,
            &quot;first_color&quot;: &quot;#1bb411&quot;,
            &quot;second_color&quot;: &quot;#e67f18&quot;,
            &quot;year_of_foundation&quot;: 1920,
            &quot;stadium&quot;: &quot;New Eldridge Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a8-7284-9497-dd0ff2498daa&quot;,
            &quot;name&quot;: &quot;Auer-Raynor&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/001166?text=sports+unde&quot;,
            &quot;first_color&quot;: &quot;#dc4053&quot;,
            &quot;second_color&quot;: &quot;#cd4b42&quot;,
            &quot;year_of_foundation&quot;: 2016,
            &quot;stadium&quot;: &quot;Goyetteside Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4be-737a-aae0-db3b065bea4c&quot;,
                    &quot;first_name&quot;: &quot;Vito&quot;,
                    &quot;last_name&quot;: &quot;Kshlerin&quot;,
                    &quot;full_name&quot;: &quot;Vito Kshlerin&quot;,
                    &quot;birth_date&quot;: &quot;1988-04-14T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 44,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4c5-7174-8a62-22d4d0af9555&quot;,
                    &quot;first_name&quot;: &quot;Oren&quot;,
                    &quot;last_name&quot;: &quot;Bergstrom&quot;,
                    &quot;full_name&quot;: &quot;Oren Bergstrom&quot;,
                    &quot;birth_date&quot;: &quot;1993-08-08T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 30,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a9-71ea-aca3-7bdf43dd9b2e&quot;,
            &quot;name&quot;: &quot;Stoltenberg Inc&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008811?text=sports+rerum&quot;,
            &quot;first_color&quot;: &quot;#32301b&quot;,
            &quot;second_color&quot;: &quot;#d488fd&quot;,
            &quot;year_of_foundation&quot;: 1973,
            &quot;stadium&quot;: &quot;South Wayne Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a9-71ea-aca3-7bdf44b28bcd&quot;,
            &quot;name&quot;: &quot;Hessel, Kiehn and Berge&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+quia&quot;,
            &quot;first_color&quot;: &quot;#f744a6&quot;,
            &quot;second_color&quot;: &quot;#6f10af&quot;,
            &quot;year_of_foundation&quot;: 2011,
            &quot;stadium&quot;: &quot;East Kaleburgh Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4a9-71ea-aca3-7bdf4561cf39&quot;,
            &quot;name&quot;: &quot;Kuhic, Hansen and Monahan&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0088aa?text=sports+blanditiis&quot;,
            &quot;first_color&quot;: &quot;#c3dd9f&quot;,
            &quot;second_color&quot;: &quot;#e0b6aa&quot;,
            &quot;year_of_foundation&quot;: 1957,
            &quot;stadium&quot;: &quot;Stiedemannshire Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4aa-7307-a54f-da0915859644&quot;,
            &quot;name&quot;: &quot;Volkman-Gutmann&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/007777?text=sports+magni&quot;,
            &quot;first_color&quot;: &quot;#fac849&quot;,
            &quot;second_color&quot;: &quot;#591855&quot;,
            &quot;year_of_foundation&quot;: 1950,
            &quot;stadium&quot;: &quot;North Justicebury Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4aa-7307-a54f-da09161bd1c2&quot;,
            &quot;name&quot;: &quot;Blick and Sons&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/000077?text=sports+nostrum&quot;,
            &quot;first_color&quot;: &quot;#c8c5b7&quot;,
            &quot;second_color&quot;: &quot;#e3cbda&quot;,
            &quot;year_of_foundation&quot;: 1902,
            &quot;stadium&quot;: &quot;Krisville Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4aa-7307-a54f-da091691880c&quot;,
            &quot;name&quot;: &quot;Carter-Mante&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbaa?text=sports+odit&quot;,
            &quot;first_color&quot;: &quot;#489a1a&quot;,
            &quot;second_color&quot;: &quot;#f996bb&quot;,
            &quot;year_of_foundation&quot;: 1993,
            &quot;stadium&quot;: &quot;Elsieland Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4b9-70de-91a6-53d6b8f1413b&quot;,
                    &quot;first_name&quot;: &quot;Alexzander&quot;,
                    &quot;last_name&quot;: &quot;Hickle&quot;,
                    &quot;full_name&quot;: &quot;Alexzander Hickle&quot;,
                    &quot;birth_date&quot;: &quot;1991-09-25T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 65,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ab-7098-8c5c-703bbf9e95eb&quot;,
            &quot;name&quot;: &quot;Borer-Krajcik&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0099ff?text=sports+aut&quot;,
            &quot;first_color&quot;: &quot;#9aa03c&quot;,
            &quot;second_color&quot;: &quot;#0e0c56&quot;,
            &quot;year_of_foundation&quot;: 1955,
            &quot;stadium&quot;: &quot;Port Bomouth Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ab-7098-8c5c-703bc0992e87&quot;,
            &quot;name&quot;: &quot;Swaniawski-Torphy&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb99?text=sports+sapiente&quot;,
            &quot;first_color&quot;: &quot;#a968f1&quot;,
            &quot;second_color&quot;: &quot;#0570bc&quot;,
            &quot;year_of_foundation&quot;: 1947,
            &quot;stadium&quot;: &quot;Nataliafort Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4c6-72cd-9ae6-50e976c31b75&quot;,
                    &quot;first_name&quot;: &quot;Kristopher&quot;,
                    &quot;last_name&quot;: &quot;Adams&quot;,
                    &quot;full_name&quot;: &quot;Kristopher Adams&quot;,
                    &quot;birth_date&quot;: &quot;1998-08-17T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 17,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ab-7098-8c5c-703bc1343dcd&quot;,
            &quot;name&quot;: &quot;Bruen-Zieme&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/007755?text=sports+qui&quot;,
            &quot;first_color&quot;: &quot;#7a8a39&quot;,
            &quot;second_color&quot;: &quot;#a4c34e&quot;,
            &quot;year_of_foundation&quot;: 2000,
            &quot;stadium&quot;: &quot;Thielhaven Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ac-718e-acee-f821efebc27a&quot;,
            &quot;name&quot;: &quot;Schmitt, Klocko and Bahringer&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dddd?text=sports+aut&quot;,
            &quot;first_color&quot;: &quot;#8167e6&quot;,
            &quot;second_color&quot;: &quot;#571ad5&quot;,
            &quot;year_of_foundation&quot;: 1943,
            &quot;stadium&quot;: &quot;Ruperthaven Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4ba-72ac-b0df-0c435b1c3469&quot;,
                    &quot;first_name&quot;: &quot;Derick&quot;,
                    &quot;last_name&quot;: &quot;Aufderhar&quot;,
                    &quot;full_name&quot;: &quot;Derick Aufderhar&quot;,
                    &quot;birth_date&quot;: &quot;1998-04-12T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 39,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ac-718e-acee-f821f09223ba&quot;,
            &quot;name&quot;: &quot;Marvin Ltd&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/003388?text=sports+magni&quot;,
            &quot;first_color&quot;: &quot;#0ac0b9&quot;,
            &quot;second_color&quot;: &quot;#335ef6&quot;,
            &quot;year_of_foundation&quot;: 1924,
            &quot;stadium&quot;: &quot;Roweside Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4bf-7121-9c35-502fbe1da9fa&quot;,
                    &quot;first_name&quot;: &quot;Timothy&quot;,
                    &quot;last_name&quot;: &quot;Pfannerstill&quot;,
                    &quot;full_name&quot;: &quot;Timothy Pfannerstill&quot;,
                    &quot;birth_date&quot;: &quot;2001-11-10T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 25,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ac-718e-acee-f821f0af1ce3&quot;,
            &quot;name&quot;: &quot;Frami-Considine&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+et&quot;,
            &quot;first_color&quot;: &quot;#c56b5f&quot;,
            &quot;second_color&quot;: &quot;#186f39&quot;,
            &quot;year_of_foundation&quot;: 1987,
            &quot;stadium&quot;: &quot;Angelview Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4b8-71a6-8aac-5ebb073e0e40&quot;,
                    &quot;first_name&quot;: &quot;Dudley&quot;,
                    &quot;last_name&quot;: &quot;Trantow&quot;,
                    &quot;full_name&quot;: &quot;Dudley Trantow&quot;,
                    &quot;birth_date&quot;: &quot;1996-10-13T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Goalkeeper&quot;,
                    &quot;number&quot;: 4,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ac-718e-acee-f821f0ba81a8&quot;,
            &quot;name&quot;: &quot;Quigley, Watsica and Feest&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006622?text=sports+asperiores&quot;,
            &quot;first_color&quot;: &quot;#7c5032&quot;,
            &quot;second_color&quot;: &quot;#e7e85c&quot;,
            &quot;year_of_foundation&quot;: 1917,
            &quot;stadium&quot;: &quot;Gorczanyville Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ad-71b7-bde2-e2e8030323b6&quot;,
            &quot;name&quot;: &quot;O&#039;Connell, Connelly and Senger&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ee44?text=sports+aut&quot;,
            &quot;first_color&quot;: &quot;#fa6325&quot;,
            &quot;second_color&quot;: &quot;#96d48d&quot;,
            &quot;year_of_foundation&quot;: 1917,
            &quot;stadium&quot;: &quot;Purdyburgh Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ad-71b7-bde2-e2e803ed9962&quot;,
            &quot;name&quot;: &quot;Ratke, Cassin and Kertzmann&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aacc?text=sports+aliquam&quot;,
            &quot;first_color&quot;: &quot;#398c72&quot;,
            &quot;second_color&quot;: &quot;#645b2e&quot;,
            &quot;year_of_foundation&quot;: 1969,
            &quot;stadium&quot;: &quot;North Mariane Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ad-71b7-bde2-e2e804b24f0c&quot;,
            &quot;name&quot;: &quot;Langosh-Ortiz&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009955?text=sports+natus&quot;,
            &quot;first_color&quot;: &quot;#bc3b01&quot;,
            &quot;second_color&quot;: &quot;#4518ec&quot;,
            &quot;year_of_foundation&quot;: 1936,
            &quot;stadium&quot;: &quot;Bryonmouth Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ad-71b7-bde2-e2e8055de486&quot;,
            &quot;name&quot;: &quot;Heller Ltd&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009955?text=sports+ut&quot;,
            &quot;first_color&quot;: &quot;#86c549&quot;,
            &quot;second_color&quot;: &quot;#e46b73&quot;,
            &quot;year_of_foundation&quot;: 1999,
            &quot;stadium&quot;: &quot;New Jocelyn Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4c2-72ca-a5a7-b35f6f9eb64d&quot;,
                    &quot;first_name&quot;: &quot;Jerad&quot;,
                    &quot;last_name&quot;: &quot;Stehr&quot;,
                    &quot;full_name&quot;: &quot;Jerad Stehr&quot;,
                    &quot;birth_date&quot;: &quot;2007-06-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 86,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ae-7151-8eb8-9cd75746cbea&quot;,
            &quot;name&quot;: &quot;Paucek, Watsica and Blanda&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa33?text=sports+autem&quot;,
            &quot;first_color&quot;: &quot;#5b6714&quot;,
            &quot;second_color&quot;: &quot;#f17e17&quot;,
            &quot;year_of_foundation&quot;: 1940,
            &quot;stadium&quot;: &quot;East Alek Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b0-708c-940e-1c44dd12b44a&quot;,
            &quot;name&quot;: &quot;Carroll and Sons&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cccc?text=sports+maiores&quot;,
            &quot;first_color&quot;: &quot;#878ee1&quot;,
            &quot;second_color&quot;: &quot;#59245a&quot;,
            &quot;year_of_foundation&quot;: 1969,
            &quot;stadium&quot;: &quot;East Mallieland Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4b9-70de-91a6-53d6b9ead844&quot;,
                    &quot;first_name&quot;: &quot;Oswaldo&quot;,
                    &quot;last_name&quot;: &quot;Buckridge&quot;,
                    &quot;full_name&quot;: &quot;Oswaldo Buckridge&quot;,
                    &quot;birth_date&quot;: &quot;1988-06-24T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Midfielder&quot;,
                    &quot;number&quot;: 19,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b0-708c-940e-1c44ddf86de1&quot;,
            &quot;name&quot;: &quot;Dibbert-Dicki&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0077ff?text=sports+dolor&quot;,
            &quot;first_color&quot;: &quot;#105896&quot;,
            &quot;second_color&quot;: &quot;#d13281&quot;,
            &quot;year_of_foundation&quot;: 1903,
            &quot;stadium&quot;: &quot;North Kylaville Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b0-708c-940e-1c44decf67c8&quot;,
            &quot;name&quot;: &quot;Ryan, Metz and Sauer&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0033ee?text=sports+ea&quot;,
            &quot;first_color&quot;: &quot;#c52ec5&quot;,
            &quot;second_color&quot;: &quot;#cbb027&quot;,
            &quot;year_of_foundation&quot;: 1913,
            &quot;stadium&quot;: &quot;Port Tamaraview Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4c3-719f-b4dc-b7af43372d7c&quot;,
                    &quot;first_name&quot;: &quot;Deven&quot;,
                    &quot;last_name&quot;: &quot;Gottlieb&quot;,
                    &quot;full_name&quot;: &quot;Deven Gottlieb&quot;,
                    &quot;birth_date&quot;: &quot;1998-12-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Defender&quot;,
                    &quot;number&quot;: 60,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b0-708c-940e-1c44df73ed6c&quot;,
            &quot;name&quot;: &quot;Feest Ltd&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0000aa?text=sports+tenetur&quot;,
            &quot;first_color&quot;: &quot;#7c0bab&quot;,
            &quot;second_color&quot;: &quot;#2420ab&quot;,
            &quot;year_of_foundation&quot;: 1979,
            &quot;stadium&quot;: &quot;Bartolettiport Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4c0-721b-8020-43d781f45cb4&quot;,
                    &quot;first_name&quot;: &quot;Walter&quot;,
                    &quot;last_name&quot;: &quot;DuBuque&quot;,
                    &quot;full_name&quot;: &quot;Walter DuBuque&quot;,
                    &quot;birth_date&quot;: &quot;1991-08-16T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 43,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b1-71bb-aa1d-18713470a82f&quot;,
            &quot;name&quot;: &quot;Ondricka-Smitham&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+debitis&quot;,
            &quot;first_color&quot;: &quot;#d60f12&quot;,
            &quot;second_color&quot;: &quot;#b90cf3&quot;,
            &quot;year_of_foundation&quot;: 2011,
            &quot;stadium&quot;: &quot;West Randal Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: [
                {
                    &quot;id&quot;: &quot;0197dc06-d4bc-70e4-b287-adc9db7fdaf2&quot;,
                    &quot;first_name&quot;: &quot;Domenic&quot;,
                    &quot;last_name&quot;: &quot;Leannon&quot;,
                    &quot;full_name&quot;: &quot;Domenic Leannon&quot;,
                    &quot;birth_date&quot;: &quot;2003-08-22T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 63,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                },
                {
                    &quot;id&quot;: &quot;0197dc06-d4c0-721b-8020-43d78184c25e&quot;,
                    &quot;first_name&quot;: &quot;Diamond&quot;,
                    &quot;last_name&quot;: &quot;Rosenbaum&quot;,
                    &quot;full_name&quot;: &quot;Diamond Rosenbaum&quot;,
                    &quot;birth_date&quot;: &quot;2005-11-23T00:00:00.000000Z&quot;,
                    &quot;role&quot;: &quot;Forward&quot;,
                    &quot;number&quot;: 88,
                    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b1-71bb-aa1d-187134716646&quot;,
            &quot;name&quot;: &quot;Wiegand-Kohler&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004455?text=sports+possimus&quot;,
            &quot;first_color&quot;: &quot;#770770&quot;,
            &quot;second_color&quot;: &quot;#7c3956&quot;,
            &quot;year_of_foundation&quot;: 1932,
            &quot;stadium&quot;: &quot;New Christophe Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b1-71bb-aa1d-1871350bf971&quot;,
            &quot;name&quot;: &quot;Hintz-Bode&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+minima&quot;,
            &quot;first_color&quot;: &quot;#b9ebaf&quot;,
            &quot;second_color&quot;: &quot;#e585be&quot;,
            &quot;year_of_foundation&quot;: 1925,
            &quot;stadium&quot;: &quot;Jaydonstad Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b1-71bb-aa1d-1871358b422e&quot;,
            &quot;name&quot;: &quot;O&#039;Hara-Bogisich&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/005599?text=sports+sunt&quot;,
            &quot;first_color&quot;: &quot;#adb519&quot;,
            &quot;second_color&quot;: &quot;#44a7bc&quot;,
            &quot;year_of_foundation&quot;: 1909,
            &quot;stadium&quot;: &quot;Bellbury Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b2-7378-ad1b-7711577665c5&quot;,
            &quot;name&quot;: &quot;Torphy-Rippin&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd99?text=sports+iste&quot;,
            &quot;first_color&quot;: &quot;#d19acf&quot;,
            &quot;second_color&quot;: &quot;#2ca4f0&quot;,
            &quot;year_of_foundation&quot;: 2001,
            &quot;stadium&quot;: &quot;Nicholeview Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b2-7378-ad1b-771157869641&quot;,
            &quot;name&quot;: &quot;Smitham PLC&quot;,
            &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011ff?text=sports+perferendis&quot;,
            &quot;first_color&quot;: &quot;#53b808&quot;,
            &quot;second_color&quot;: &quot;#53b83c&quot;,
            &quot;year_of_foundation&quot;: 1994,
            &quot;stadium&quot;: &quot;Handview Stadium&quot;,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;players&quot;: []
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-teams" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-teams"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teams"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-teams" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-teams">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-teams" data-method="GET"
      data-path="api/teams"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-teams', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-teams"
                    onclick="tryItOut('GETapi-teams');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-teams"
                    onclick="cancelTryOut('GETapi-teams');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-teams"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/teams</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-teams">POST api/teams</h2>

<p>
</p>



<span id="example-requests-POSTapi-teams">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://football-app.test/api/teams" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"logo\": \"http:\\/\\/www.kunde.com\\/\",
    \"first_color\": \"iihfqc\",
    \"second_color\": \"oynlaz\",
    \"stadium\": \"ghdtqtqxbajwbpilpmufi\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/teams"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "logo": "http:\/\/www.kunde.com\/",
    "first_color": "iihfqc",
    "second_color": "oynlaz",
    "stadium": "ghdtqtqxbajwbpilpmufi"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-teams">
</span>
<span id="execution-results-POSTapi-teams" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-teams"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-teams"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-teams" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-teams">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-teams" data-method="POST"
      data-path="api/teams"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-teams', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-teams"
                    onclick="tryItOut('POSTapi-teams');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-teams"
                    onclick="cancelTryOut('POSTapi-teams');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-teams"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/teams</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-teams"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="logo"                data-endpoint="POSTapi-teams"
               value="http://www.kunde.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.kunde.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_color</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="first_color"                data-endpoint="POSTapi-teams"
               value="iihfqc"
               data-component="body">
    <br>
<p>Must not be greater than 7 characters. Example: <code>iihfqc</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>second_color</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="second_color"                data-endpoint="POSTapi-teams"
               value="oynlaz"
               data-component="body">
    <br>
<p>Must not be greater than 7 characters. Example: <code>oynlaz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>year_of_foundation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="year_of_foundation"                data-endpoint="POSTapi-teams"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stadium</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="stadium"                data-endpoint="POSTapi-teams"
               value="ghdtqtqxbajwbpilpmufi"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>ghdtqtqxbajwbpilpmufi</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-teams--id-">GET api/teams/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-teams--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://football-app.test/api/teams/0197dc06-d427-721c-9da4-04d03851f463" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/teams/0197dc06-d427-721c-9da4-04d03851f463"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-teams--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
    &quot;name&quot;: &quot;Blick LLC&quot;,
    &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
    &quot;first_color&quot;: &quot;#e3883f&quot;,
    &quot;second_color&quot;: &quot;#f32005&quot;,
    &quot;year_of_foundation&quot;: 1909,
    &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
    &quot;players&quot;: [
        {
            &quot;id&quot;: &quot;0197dc06-d429-7363-8b05-6cc9d20b07bd&quot;,
            &quot;first_name&quot;: &quot;Saige&quot;,
            &quot;last_name&quot;: &quot;Hegmann&quot;,
            &quot;full_name&quot;: &quot;Saige Hegmann&quot;,
            &quot;birth_date&quot;: &quot;1994-10-24T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 10,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42b-702a-a7b1-5d7beb1d1747&quot;,
            &quot;first_name&quot;: &quot;Lester&quot;,
            &quot;last_name&quot;: &quot;Koss&quot;,
            &quot;full_name&quot;: &quot;Lester Koss&quot;,
            &quot;birth_date&quot;: &quot;2005-02-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 1,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42c-73c3-ac09-53a36d03d3ef&quot;,
            &quot;first_name&quot;: &quot;Tate&quot;,
            &quot;last_name&quot;: &quot;Veum&quot;,
            &quot;full_name&quot;: &quot;Tate Veum&quot;,
            &quot;birth_date&quot;: &quot;1994-09-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 64,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42c-73c3-ac09-53a36d9d2eb6&quot;,
            &quot;first_name&quot;: &quot;Christopher&quot;,
            &quot;last_name&quot;: &quot;Marvin&quot;,
            &quot;full_name&quot;: &quot;Christopher Marvin&quot;,
            &quot;birth_date&quot;: &quot;1993-12-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 41,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42d-73c9-a148-8b99743cd32a&quot;,
            &quot;first_name&quot;: &quot;Waldo&quot;,
            &quot;last_name&quot;: &quot;Corkery&quot;,
            &quot;full_name&quot;: &quot;Waldo Corkery&quot;,
            &quot;birth_date&quot;: &quot;1985-07-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 42,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42e-70f5-b694-50c100a5afdd&quot;,
            &quot;first_name&quot;: &quot;Seth&quot;,
            &quot;last_name&quot;: &quot;Schmidt&quot;,
            &quot;full_name&quot;: &quot;Seth Schmidt&quot;,
            &quot;birth_date&quot;: &quot;2000-09-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 56,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42e-70f5-b694-50c1017be791&quot;,
            &quot;first_name&quot;: &quot;Jabari&quot;,
            &quot;last_name&quot;: &quot;Ullrich&quot;,
            &quot;full_name&quot;: &quot;Jabari Ullrich&quot;,
            &quot;birth_date&quot;: &quot;1996-04-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 15,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42f-720f-88f0-61893cf22428&quot;,
            &quot;first_name&quot;: &quot;Kirk&quot;,
            &quot;last_name&quot;: &quot;Bruen&quot;,
            &quot;full_name&quot;: &quot;Kirk Bruen&quot;,
            &quot;birth_date&quot;: &quot;2000-07-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 57,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d430-73d2-a834-a27673e474cd&quot;,
            &quot;first_name&quot;: &quot;Aiden&quot;,
            &quot;last_name&quot;: &quot;Willms&quot;,
            &quot;full_name&quot;: &quot;Aiden Willms&quot;,
            &quot;birth_date&quot;: &quot;1992-10-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 20,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d430-73d2-a834-a27674cda255&quot;,
            &quot;first_name&quot;: &quot;Mario&quot;,
            &quot;last_name&quot;: &quot;Rowe&quot;,
            &quot;full_name&quot;: &quot;Mario Rowe&quot;,
            &quot;birth_date&quot;: &quot;1990-03-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 66,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d431-7106-8e29-e1b43e25a817&quot;,
            &quot;first_name&quot;: &quot;Jameson&quot;,
            &quot;last_name&quot;: &quot;Leannon&quot;,
            &quot;full_name&quot;: &quot;Jameson Leannon&quot;,
            &quot;birth_date&quot;: &quot;2004-02-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 90,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d431-7106-8e29-e1b43e31231c&quot;,
            &quot;first_name&quot;: &quot;Doris&quot;,
            &quot;last_name&quot;: &quot;Orn&quot;,
            &quot;full_name&quot;: &quot;Doris Orn&quot;,
            &quot;birth_date&quot;: &quot;1989-03-05T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 98,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d432-717b-aa12-48a4157391c9&quot;,
            &quot;first_name&quot;: &quot;Tate&quot;,
            &quot;last_name&quot;: &quot;Hoppe&quot;,
            &quot;full_name&quot;: &quot;Tate Hoppe&quot;,
            &quot;birth_date&quot;: &quot;2004-11-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 23,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d433-72bc-afc3-11e861233342&quot;,
            &quot;first_name&quot;: &quot;Derick&quot;,
            &quot;last_name&quot;: &quot;Ullrich&quot;,
            &quot;full_name&quot;: &quot;Derick Ullrich&quot;,
            &quot;birth_date&quot;: &quot;1991-01-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 55,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d434-72fc-ace7-c2f90d6de70a&quot;,
            &quot;first_name&quot;: &quot;Diamond&quot;,
            &quot;last_name&quot;: &quot;Olson&quot;,
            &quot;full_name&quot;: &quot;Diamond Olson&quot;,
            &quot;birth_date&quot;: &quot;1992-08-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 61,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d434-72fc-ace7-c2f90dac1e33&quot;,
            &quot;first_name&quot;: &quot;Gust&quot;,
            &quot;last_name&quot;: &quot;Jast&quot;,
            &quot;full_name&quot;: &quot;Gust Jast&quot;,
            &quot;birth_date&quot;: &quot;1989-11-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 13,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d435-702a-abb0-643b088135a6&quot;,
            &quot;first_name&quot;: &quot;Herman&quot;,
            &quot;last_name&quot;: &quot;Lebsack&quot;,
            &quot;full_name&quot;: &quot;Herman Lebsack&quot;,
            &quot;birth_date&quot;: &quot;1987-05-28T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 49,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        }
    ],
    &quot;competitions&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-teams--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-teams--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teams--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-teams--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-teams--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-teams--id-" data-method="GET"
      data-path="api/teams/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-teams--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-teams--id-"
                    onclick="tryItOut('GETapi-teams--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-teams--id-"
                    onclick="cancelTryOut('GETapi-teams--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-teams--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/teams/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-teams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-teams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-teams--id-"
               value="0197dc06-d427-721c-9da4-04d03851f463"
               data-component="url">
    <br>
<p>The ID of the team. Example: <code>0197dc06-d427-721c-9da4-04d03851f463</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-teams--id-">PUT api/teams/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-teams--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://football-app.test/api/teams/0197dc06-d427-721c-9da4-04d03851f463" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"logo\": \"http:\\/\\/www.kunde.com\\/\",
    \"first_color\": \"iihfqc\",
    \"second_color\": \"oynlaz\",
    \"stadium\": \"ghdtqtqxbajwbpilpmufi\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/teams/0197dc06-d427-721c-9da4-04d03851f463"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "logo": "http:\/\/www.kunde.com\/",
    "first_color": "iihfqc",
    "second_color": "oynlaz",
    "stadium": "ghdtqtqxbajwbpilpmufi"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-teams--id-">
</span>
<span id="execution-results-PUTapi-teams--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-teams--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-teams--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-teams--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-teams--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-teams--id-" data-method="PUT"
      data-path="api/teams/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-teams--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-teams--id-"
                    onclick="tryItOut('PUTapi-teams--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-teams--id-"
                    onclick="cancelTryOut('PUTapi-teams--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-teams--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/teams/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/teams/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-teams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-teams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-teams--id-"
               value="0197dc06-d427-721c-9da4-04d03851f463"
               data-component="url">
    <br>
<p>The ID of the team. Example: <code>0197dc06-d427-721c-9da4-04d03851f463</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-teams--id-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="logo"                data-endpoint="PUTapi-teams--id-"
               value="http://www.kunde.com/"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.kunde.com/</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_color</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="first_color"                data-endpoint="PUTapi-teams--id-"
               value="iihfqc"
               data-component="body">
    <br>
<p>Must not be greater than 7 characters. Example: <code>iihfqc</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>second_color</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="second_color"                data-endpoint="PUTapi-teams--id-"
               value="oynlaz"
               data-component="body">
    <br>
<p>Must not be greater than 7 characters. Example: <code>oynlaz</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>year_of_foundation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="year_of_foundation"                data-endpoint="PUTapi-teams--id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stadium</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="stadium"                data-endpoint="PUTapi-teams--id-"
               value="ghdtqtqxbajwbpilpmufi"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>ghdtqtqxbajwbpilpmufi</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-teams--id-">DELETE api/teams/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-teams--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://football-app.test/api/teams/0197dc06-d427-721c-9da4-04d03851f463" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/teams/0197dc06-d427-721c-9da4-04d03851f463"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-teams--id-">
</span>
<span id="execution-results-DELETEapi-teams--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-teams--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-teams--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-teams--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-teams--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-teams--id-" data-method="DELETE"
      data-path="api/teams/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-teams--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-teams--id-"
                    onclick="tryItOut('DELETEapi-teams--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-teams--id-"
                    onclick="cancelTryOut('DELETEapi-teams--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-teams--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/teams/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-teams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-teams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-teams--id-"
               value="0197dc06-d427-721c-9da4-04d03851f463"
               data-component="url">
    <br>
<p>The ID of the team. Example: <code>0197dc06-d427-721c-9da4-04d03851f463</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-teams--team_id--players">GET api/teams/{team_id}/players</h2>

<p>
</p>



<span id="example-requests-GETapi-teams--team_id--players">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://football-app.test/api/teams/0197dc06-d427-721c-9da4-04d03851f463/players" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/teams/0197dc06-d427-721c-9da4-04d03851f463/players"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-teams--team_id--players">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;0197dc06-d429-7363-8b05-6cc9d20b07bd&quot;,
            &quot;first_name&quot;: &quot;Saige&quot;,
            &quot;last_name&quot;: &quot;Hegmann&quot;,
            &quot;full_name&quot;: &quot;Saige Hegmann&quot;,
            &quot;birth_date&quot;: &quot;1994-10-24T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 10,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42b-702a-a7b1-5d7beb1d1747&quot;,
            &quot;first_name&quot;: &quot;Lester&quot;,
            &quot;last_name&quot;: &quot;Koss&quot;,
            &quot;full_name&quot;: &quot;Lester Koss&quot;,
            &quot;birth_date&quot;: &quot;2005-02-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 1,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42c-73c3-ac09-53a36d03d3ef&quot;,
            &quot;first_name&quot;: &quot;Tate&quot;,
            &quot;last_name&quot;: &quot;Veum&quot;,
            &quot;full_name&quot;: &quot;Tate Veum&quot;,
            &quot;birth_date&quot;: &quot;1994-09-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 64,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42c-73c3-ac09-53a36d9d2eb6&quot;,
            &quot;first_name&quot;: &quot;Christopher&quot;,
            &quot;last_name&quot;: &quot;Marvin&quot;,
            &quot;full_name&quot;: &quot;Christopher Marvin&quot;,
            &quot;birth_date&quot;: &quot;1993-12-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 41,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42d-73c9-a148-8b99743cd32a&quot;,
            &quot;first_name&quot;: &quot;Waldo&quot;,
            &quot;last_name&quot;: &quot;Corkery&quot;,
            &quot;full_name&quot;: &quot;Waldo Corkery&quot;,
            &quot;birth_date&quot;: &quot;1985-07-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 42,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42e-70f5-b694-50c100a5afdd&quot;,
            &quot;first_name&quot;: &quot;Seth&quot;,
            &quot;last_name&quot;: &quot;Schmidt&quot;,
            &quot;full_name&quot;: &quot;Seth Schmidt&quot;,
            &quot;birth_date&quot;: &quot;2000-09-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 56,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42e-70f5-b694-50c1017be791&quot;,
            &quot;first_name&quot;: &quot;Jabari&quot;,
            &quot;last_name&quot;: &quot;Ullrich&quot;,
            &quot;full_name&quot;: &quot;Jabari Ullrich&quot;,
            &quot;birth_date&quot;: &quot;1996-04-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 15,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42f-720f-88f0-61893cf22428&quot;,
            &quot;first_name&quot;: &quot;Kirk&quot;,
            &quot;last_name&quot;: &quot;Bruen&quot;,
            &quot;full_name&quot;: &quot;Kirk Bruen&quot;,
            &quot;birth_date&quot;: &quot;2000-07-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 57,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d430-73d2-a834-a27673e474cd&quot;,
            &quot;first_name&quot;: &quot;Aiden&quot;,
            &quot;last_name&quot;: &quot;Willms&quot;,
            &quot;full_name&quot;: &quot;Aiden Willms&quot;,
            &quot;birth_date&quot;: &quot;1992-10-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 20,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d430-73d2-a834-a27674cda255&quot;,
            &quot;first_name&quot;: &quot;Mario&quot;,
            &quot;last_name&quot;: &quot;Rowe&quot;,
            &quot;full_name&quot;: &quot;Mario Rowe&quot;,
            &quot;birth_date&quot;: &quot;1990-03-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 66,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d431-7106-8e29-e1b43e25a817&quot;,
            &quot;first_name&quot;: &quot;Jameson&quot;,
            &quot;last_name&quot;: &quot;Leannon&quot;,
            &quot;full_name&quot;: &quot;Jameson Leannon&quot;,
            &quot;birth_date&quot;: &quot;2004-02-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 90,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d431-7106-8e29-e1b43e31231c&quot;,
            &quot;first_name&quot;: &quot;Doris&quot;,
            &quot;last_name&quot;: &quot;Orn&quot;,
            &quot;full_name&quot;: &quot;Doris Orn&quot;,
            &quot;birth_date&quot;: &quot;1989-03-05T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 98,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d432-717b-aa12-48a4157391c9&quot;,
            &quot;first_name&quot;: &quot;Tate&quot;,
            &quot;last_name&quot;: &quot;Hoppe&quot;,
            &quot;full_name&quot;: &quot;Tate Hoppe&quot;,
            &quot;birth_date&quot;: &quot;2004-11-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 23,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d433-72bc-afc3-11e861233342&quot;,
            &quot;first_name&quot;: &quot;Derick&quot;,
            &quot;last_name&quot;: &quot;Ullrich&quot;,
            &quot;full_name&quot;: &quot;Derick Ullrich&quot;,
            &quot;birth_date&quot;: &quot;1991-01-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 55,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d434-72fc-ace7-c2f90d6de70a&quot;,
            &quot;first_name&quot;: &quot;Diamond&quot;,
            &quot;last_name&quot;: &quot;Olson&quot;,
            &quot;full_name&quot;: &quot;Diamond Olson&quot;,
            &quot;birth_date&quot;: &quot;1992-08-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 61,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d434-72fc-ace7-c2f90dac1e33&quot;,
            &quot;first_name&quot;: &quot;Gust&quot;,
            &quot;last_name&quot;: &quot;Jast&quot;,
            &quot;full_name&quot;: &quot;Gust Jast&quot;,
            &quot;birth_date&quot;: &quot;1989-11-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 13,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        },
        {
            &quot;id&quot;: &quot;0197dc06-d435-702a-abb0-643b088135a6&quot;,
            &quot;first_name&quot;: &quot;Herman&quot;,
            &quot;last_name&quot;: &quot;Lebsack&quot;,
            &quot;full_name&quot;: &quot;Herman Lebsack&quot;,
            &quot;birth_date&quot;: &quot;1987-05-28T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 49,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-teams--team_id--players" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-teams--team_id--players"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teams--team_id--players"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-teams--team_id--players" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-teams--team_id--players">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-teams--team_id--players" data-method="GET"
      data-path="api/teams/{team_id}/players"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-teams--team_id--players', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-teams--team_id--players"
                    onclick="tryItOut('GETapi-teams--team_id--players');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-teams--team_id--players"
                    onclick="cancelTryOut('GETapi-teams--team_id--players');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-teams--team_id--players"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/teams/{team_id}/players</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-teams--team_id--players"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-teams--team_id--players"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="team_id"                data-endpoint="GETapi-teams--team_id--players"
               value="0197dc06-d427-721c-9da4-04d03851f463"
               data-component="url">
    <br>
<p>The ID of the team. Example: <code>0197dc06-d427-721c-9da4-04d03851f463</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-players">GET api/players</h2>

<p>
</p>



<span id="example-requests-GETapi-players">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://football-app.test/api/players" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/players"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-players">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: &quot;0197dc06-d429-7363-8b05-6cc9d20b07bd&quot;,
            &quot;first_name&quot;: &quot;Saige&quot;,
            &quot;last_name&quot;: &quot;Hegmann&quot;,
            &quot;full_name&quot;: &quot;Saige Hegmann&quot;,
            &quot;birth_date&quot;: &quot;1994-10-24T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 10,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42b-702a-a7b1-5d7beb1d1747&quot;,
            &quot;first_name&quot;: &quot;Lester&quot;,
            &quot;last_name&quot;: &quot;Koss&quot;,
            &quot;full_name&quot;: &quot;Lester Koss&quot;,
            &quot;birth_date&quot;: &quot;2005-02-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 1,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42c-73c3-ac09-53a36d03d3ef&quot;,
            &quot;first_name&quot;: &quot;Tate&quot;,
            &quot;last_name&quot;: &quot;Veum&quot;,
            &quot;full_name&quot;: &quot;Tate Veum&quot;,
            &quot;birth_date&quot;: &quot;1994-09-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 64,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42c-73c3-ac09-53a36d9d2eb6&quot;,
            &quot;first_name&quot;: &quot;Christopher&quot;,
            &quot;last_name&quot;: &quot;Marvin&quot;,
            &quot;full_name&quot;: &quot;Christopher Marvin&quot;,
            &quot;birth_date&quot;: &quot;1993-12-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 41,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42d-73c9-a148-8b99743cd32a&quot;,
            &quot;first_name&quot;: &quot;Waldo&quot;,
            &quot;last_name&quot;: &quot;Corkery&quot;,
            &quot;full_name&quot;: &quot;Waldo Corkery&quot;,
            &quot;birth_date&quot;: &quot;1985-07-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 42,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42e-70f5-b694-50c100a5afdd&quot;,
            &quot;first_name&quot;: &quot;Seth&quot;,
            &quot;last_name&quot;: &quot;Schmidt&quot;,
            &quot;full_name&quot;: &quot;Seth Schmidt&quot;,
            &quot;birth_date&quot;: &quot;2000-09-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 56,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42e-70f5-b694-50c1017be791&quot;,
            &quot;first_name&quot;: &quot;Jabari&quot;,
            &quot;last_name&quot;: &quot;Ullrich&quot;,
            &quot;full_name&quot;: &quot;Jabari Ullrich&quot;,
            &quot;birth_date&quot;: &quot;1996-04-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 15,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d42f-720f-88f0-61893cf22428&quot;,
            &quot;first_name&quot;: &quot;Kirk&quot;,
            &quot;last_name&quot;: &quot;Bruen&quot;,
            &quot;full_name&quot;: &quot;Kirk Bruen&quot;,
            &quot;birth_date&quot;: &quot;2000-07-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 57,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d430-73d2-a834-a27673e474cd&quot;,
            &quot;first_name&quot;: &quot;Aiden&quot;,
            &quot;last_name&quot;: &quot;Willms&quot;,
            &quot;full_name&quot;: &quot;Aiden Willms&quot;,
            &quot;birth_date&quot;: &quot;1992-10-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 20,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d430-73d2-a834-a27674cda255&quot;,
            &quot;first_name&quot;: &quot;Mario&quot;,
            &quot;last_name&quot;: &quot;Rowe&quot;,
            &quot;full_name&quot;: &quot;Mario Rowe&quot;,
            &quot;birth_date&quot;: &quot;1990-03-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 66,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d431-7106-8e29-e1b43e25a817&quot;,
            &quot;first_name&quot;: &quot;Jameson&quot;,
            &quot;last_name&quot;: &quot;Leannon&quot;,
            &quot;full_name&quot;: &quot;Jameson Leannon&quot;,
            &quot;birth_date&quot;: &quot;2004-02-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 90,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d431-7106-8e29-e1b43e31231c&quot;,
            &quot;first_name&quot;: &quot;Doris&quot;,
            &quot;last_name&quot;: &quot;Orn&quot;,
            &quot;full_name&quot;: &quot;Doris Orn&quot;,
            &quot;birth_date&quot;: &quot;1989-03-05T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 98,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d432-717b-aa12-48a4157391c9&quot;,
            &quot;first_name&quot;: &quot;Tate&quot;,
            &quot;last_name&quot;: &quot;Hoppe&quot;,
            &quot;full_name&quot;: &quot;Tate Hoppe&quot;,
            &quot;birth_date&quot;: &quot;2004-11-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 23,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d433-72bc-afc3-11e861233342&quot;,
            &quot;first_name&quot;: &quot;Derick&quot;,
            &quot;last_name&quot;: &quot;Ullrich&quot;,
            &quot;full_name&quot;: &quot;Derick Ullrich&quot;,
            &quot;birth_date&quot;: &quot;1991-01-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 55,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d434-72fc-ace7-c2f90d6de70a&quot;,
            &quot;first_name&quot;: &quot;Diamond&quot;,
            &quot;last_name&quot;: &quot;Olson&quot;,
            &quot;full_name&quot;: &quot;Diamond Olson&quot;,
            &quot;birth_date&quot;: &quot;1992-08-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 61,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d434-72fc-ace7-c2f90dac1e33&quot;,
            &quot;first_name&quot;: &quot;Gust&quot;,
            &quot;last_name&quot;: &quot;Jast&quot;,
            &quot;full_name&quot;: &quot;Gust Jast&quot;,
            &quot;birth_date&quot;: &quot;1989-11-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 13,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d435-702a-abb0-643b088135a6&quot;,
            &quot;first_name&quot;: &quot;Herman&quot;,
            &quot;last_name&quot;: &quot;Lebsack&quot;,
            &quot;full_name&quot;: &quot;Herman Lebsack&quot;,
            &quot;birth_date&quot;: &quot;1987-05-28T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 49,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#e3883f&quot;,
                &quot;second_color&quot;: &quot;#f32005&quot;,
                &quot;year_of_foundation&quot;: 1909,
                &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa90423716&quot;,
            &quot;first_name&quot;: &quot;Roscoe&quot;,
            &quot;last_name&quot;: &quot;Rodriguez&quot;,
            &quot;full_name&quot;: &quot;Roscoe Rodriguez&quot;,
            &quot;birth_date&quot;: &quot;1999-02-01T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 96,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d437-73b1-aece-5b7102791db2&quot;,
            &quot;first_name&quot;: &quot;Herminio&quot;,
            &quot;last_name&quot;: &quot;Funk&quot;,
            &quot;full_name&quot;: &quot;Herminio Funk&quot;,
            &quot;birth_date&quot;: &quot;1995-12-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 31,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d438-7172-bdad-ec5618bb40db&quot;,
            &quot;first_name&quot;: &quot;Geovany&quot;,
            &quot;last_name&quot;: &quot;Harris&quot;,
            &quot;full_name&quot;: &quot;Geovany Harris&quot;,
            &quot;birth_date&quot;: &quot;1994-09-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 34,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d439-7064-b03f-42a1ac541e67&quot;,
            &quot;first_name&quot;: &quot;Rene&quot;,
            &quot;last_name&quot;: &quot;Fadel&quot;,
            &quot;full_name&quot;: &quot;Rene Fadel&quot;,
            &quot;birth_date&quot;: &quot;1991-05-17T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 89,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d43a-73e3-9962-75fdf02c57df&quot;,
            &quot;first_name&quot;: &quot;Glen&quot;,
            &quot;last_name&quot;: &quot;Konopelski&quot;,
            &quot;full_name&quot;: &quot;Glen Konopelski&quot;,
            &quot;birth_date&quot;: &quot;1995-11-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 28,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d43b-723b-93ae-7bf963529658&quot;,
            &quot;first_name&quot;: &quot;Peter&quot;,
            &quot;last_name&quot;: &quot;Barrows&quot;,
            &quot;full_name&quot;: &quot;Peter Barrows&quot;,
            &quot;birth_date&quot;: &quot;1986-11-08T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 70,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d43b-723b-93ae-7bf9644cb971&quot;,
            &quot;first_name&quot;: &quot;Mason&quot;,
            &quot;last_name&quot;: &quot;Jerde&quot;,
            &quot;full_name&quot;: &quot;Mason Jerde&quot;,
            &quot;birth_date&quot;: &quot;1996-07-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 30,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d43c-726f-afd5-9a5dacb716fc&quot;,
            &quot;first_name&quot;: &quot;Jaron&quot;,
            &quot;last_name&quot;: &quot;Bernier&quot;,
            &quot;full_name&quot;: &quot;Jaron Bernier&quot;,
            &quot;birth_date&quot;: &quot;1998-05-24T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 82,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d43d-70cc-b00f-79e2a5578b0e&quot;,
            &quot;first_name&quot;: &quot;Brian&quot;,
            &quot;last_name&quot;: &quot;Moen&quot;,
            &quot;full_name&quot;: &quot;Brian Moen&quot;,
            &quot;birth_date&quot;: &quot;2002-06-22T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 69,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d43e-70f1-a603-5a576f9d2aeb&quot;,
            &quot;first_name&quot;: &quot;Dee&quot;,
            &quot;last_name&quot;: &quot;Tremblay&quot;,
            &quot;full_name&quot;: &quot;Dee Tremblay&quot;,
            &quot;birth_date&quot;: &quot;2002-10-12T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 23,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d43f-7147-b327-c6e2ffc4831b&quot;,
            &quot;first_name&quot;: &quot;Price&quot;,
            &quot;last_name&quot;: &quot;Gleason&quot;,
            &quot;full_name&quot;: &quot;Price Gleason&quot;,
            &quot;birth_date&quot;: &quot;2004-04-20T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 46,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d43f-7147-b327-c6e2fff78453&quot;,
            &quot;first_name&quot;: &quot;Cade&quot;,
            &quot;last_name&quot;: &quot;Becker&quot;,
            &quot;full_name&quot;: &quot;Cade Becker&quot;,
            &quot;birth_date&quot;: &quot;1993-04-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 38,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d440-7057-8081-58861e59e37b&quot;,
            &quot;first_name&quot;: &quot;Rodolfo&quot;,
            &quot;last_name&quot;: &quot;Carter&quot;,
            &quot;full_name&quot;: &quot;Rodolfo Carter&quot;,
            &quot;birth_date&quot;: &quot;1988-04-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 32,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d441-712a-8411-5567872a30a0&quot;,
            &quot;first_name&quot;: &quot;Brock&quot;,
            &quot;last_name&quot;: &quot;Denesik&quot;,
            &quot;full_name&quot;: &quot;Brock Denesik&quot;,
            &quot;birth_date&quot;: &quot;2003-04-24T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 2,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d442-7256-8af0-d0750d0c406a&quot;,
            &quot;first_name&quot;: &quot;Barry&quot;,
            &quot;last_name&quot;: &quot;Schmeler&quot;,
            &quot;full_name&quot;: &quot;Barry Schmeler&quot;,
            &quot;birth_date&quot;: &quot;1998-04-17T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 74,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d442-7256-8af0-d0750d497ece&quot;,
            &quot;first_name&quot;: &quot;Tremaine&quot;,
            &quot;last_name&quot;: &quot;Orn&quot;,
            &quot;full_name&quot;: &quot;Tremaine Orn&quot;,
            &quot;birth_date&quot;: &quot;1997-11-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 64,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6a832c73&quot;,
            &quot;first_name&quot;: &quot;Boyd&quot;,
            &quot;last_name&quot;: &quot;Donnelly&quot;,
            &quot;full_name&quot;: &quot;Boyd Donnelly&quot;,
            &quot;birth_date&quot;: &quot;1991-10-15T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 25,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d436-7189-a826-31aa901d5d0d&quot;,
                &quot;name&quot;: &quot;Metz-Wiza&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004477?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#6d3d0f&quot;,
                &quot;second_color&quot;: &quot;#49cc64&quot;,
                &quot;year_of_foundation&quot;: 2003,
                &quot;stadium&quot;: &quot;Effertzstad Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d444-7319-afaa-d3998f7007b5&quot;,
            &quot;first_name&quot;: &quot;Brown&quot;,
            &quot;last_name&quot;: &quot;Abernathy&quot;,
            &quot;full_name&quot;: &quot;Brown Abernathy&quot;,
            &quot;birth_date&quot;: &quot;1985-09-05T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 46,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d444-7319-afaa-d3998f91f113&quot;,
            &quot;first_name&quot;: &quot;Sherwood&quot;,
            &quot;last_name&quot;: &quot;Ruecker&quot;,
            &quot;full_name&quot;: &quot;Sherwood Ruecker&quot;,
            &quot;birth_date&quot;: &quot;1989-08-07T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 62,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d445-738c-aaf2-783f3e85a0cf&quot;,
            &quot;first_name&quot;: &quot;Santa&quot;,
            &quot;last_name&quot;: &quot;Bosco&quot;,
            &quot;full_name&quot;: &quot;Santa Bosco&quot;,
            &quot;birth_date&quot;: &quot;1990-09-12T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 47,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d446-7291-bc72-4944abb5a029&quot;,
            &quot;first_name&quot;: &quot;Jeremy&quot;,
            &quot;last_name&quot;: &quot;Kiehn&quot;,
            &quot;full_name&quot;: &quot;Jeremy Kiehn&quot;,
            &quot;birth_date&quot;: &quot;1997-12-13T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 32,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d446-7291-bc72-4944acaa5eda&quot;,
            &quot;first_name&quot;: &quot;Turner&quot;,
            &quot;last_name&quot;: &quot;Mitchell&quot;,
            &quot;full_name&quot;: &quot;Turner Mitchell&quot;,
            &quot;birth_date&quot;: &quot;1988-03-23T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 5,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d446-7291-bc72-4944acdc458d&quot;,
            &quot;first_name&quot;: &quot;Keven&quot;,
            &quot;last_name&quot;: &quot;Bernhard&quot;,
            &quot;full_name&quot;: &quot;Keven Bernhard&quot;,
            &quot;birth_date&quot;: &quot;1989-05-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 72,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d447-7393-b126-d4ff7e7aa03f&quot;,
            &quot;first_name&quot;: &quot;Helmer&quot;,
            &quot;last_name&quot;: &quot;Kemmer&quot;,
            &quot;full_name&quot;: &quot;Helmer Kemmer&quot;,
            &quot;birth_date&quot;: &quot;1985-12-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 64,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d447-7393-b126-d4ff7e7bfe02&quot;,
            &quot;first_name&quot;: &quot;Tyrell&quot;,
            &quot;last_name&quot;: &quot;Spinka&quot;,
            &quot;full_name&quot;: &quot;Tyrell Spinka&quot;,
            &quot;birth_date&quot;: &quot;1987-09-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 66,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d448-7187-ac18-f3457953fdd1&quot;,
            &quot;first_name&quot;: &quot;Tristian&quot;,
            &quot;last_name&quot;: &quot;Conn&quot;,
            &quot;full_name&quot;: &quot;Tristian Conn&quot;,
            &quot;birth_date&quot;: &quot;1988-05-17T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 52,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d448-7187-ac18-f34579f117c0&quot;,
            &quot;first_name&quot;: &quot;Bryce&quot;,
            &quot;last_name&quot;: &quot;Cassin&quot;,
            &quot;full_name&quot;: &quot;Bryce Cassin&quot;,
            &quot;birth_date&quot;: &quot;1994-09-17T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 82,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d448-7187-ac18-f3457a3f7162&quot;,
            &quot;first_name&quot;: &quot;Fidel&quot;,
            &quot;last_name&quot;: &quot;Walter&quot;,
            &quot;full_name&quot;: &quot;Fidel Walter&quot;,
            &quot;birth_date&quot;: &quot;1992-12-28T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 60,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d449-7324-9dd7-d31acd1a889c&quot;,
            &quot;first_name&quot;: &quot;Dean&quot;,
            &quot;last_name&quot;: &quot;Mertz&quot;,
            &quot;full_name&quot;: &quot;Dean Mertz&quot;,
            &quot;birth_date&quot;: &quot;1987-01-21T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 30,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d449-7324-9dd7-d31acd879f14&quot;,
            &quot;first_name&quot;: &quot;Clyde&quot;,
            &quot;last_name&quot;: &quot;Kemmer&quot;,
            &quot;full_name&quot;: &quot;Clyde Kemmer&quot;,
            &quot;birth_date&quot;: &quot;1996-03-23T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 71,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44a-71d6-9f22-0d87b6489b0d&quot;,
            &quot;first_name&quot;: &quot;Haskell&quot;,
            &quot;last_name&quot;: &quot;Mills&quot;,
            &quot;full_name&quot;: &quot;Haskell Mills&quot;,
            &quot;birth_date&quot;: &quot;1986-08-13T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 67,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44a-71d6-9f22-0d87b7141682&quot;,
            &quot;first_name&quot;: &quot;Cyril&quot;,
            &quot;last_name&quot;: &quot;Carroll&quot;,
            &quot;full_name&quot;: &quot;Cyril Carroll&quot;,
            &quot;birth_date&quot;: &quot;1996-05-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 8,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44a-71d6-9f22-0d87b73b1185&quot;,
            &quot;first_name&quot;: &quot;Art&quot;,
            &quot;last_name&quot;: &quot;Kris&quot;,
            &quot;full_name&quot;: &quot;Art Kris&quot;,
            &quot;birth_date&quot;: &quot;1988-04-17T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 89,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c3e57e05&quot;,
            &quot;first_name&quot;: &quot;Bennie&quot;,
            &quot;last_name&quot;: &quot;Dicki&quot;,
            &quot;full_name&quot;: &quot;Bennie Dicki&quot;,
            &quot;birth_date&quot;: &quot;2005-04-30T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 19,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d443-7034-8ed6-dacf6b067e83&quot;,
                &quot;name&quot;: &quot;Kris and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/006633?text=sports+sed&quot;,
                &quot;first_color&quot;: &quot;#0de1cc&quot;,
                &quot;second_color&quot;: &quot;#f4e7e0&quot;,
                &quot;year_of_foundation&quot;: 1905,
                &quot;stadium&quot;: &quot;Boehmberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44c-72ea-a3cd-02aaeae4cfe3&quot;,
            &quot;first_name&quot;: &quot;Brody&quot;,
            &quot;last_name&quot;: &quot;Wolff&quot;,
            &quot;full_name&quot;: &quot;Brody Wolff&quot;,
            &quot;birth_date&quot;: &quot;2003-02-07T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 66,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44c-72ea-a3cd-02aaebb8bd99&quot;,
            &quot;first_name&quot;: &quot;Zackary&quot;,
            &quot;last_name&quot;: &quot;Bogan&quot;,
            &quot;full_name&quot;: &quot;Zackary Bogan&quot;,
            &quot;birth_date&quot;: &quot;1987-08-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 91,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44d-7262-9f10-99b1db3b35af&quot;,
            &quot;first_name&quot;: &quot;Alexander&quot;,
            &quot;last_name&quot;: &quot;Monahan&quot;,
            &quot;full_name&quot;: &quot;Alexander Monahan&quot;,
            &quot;birth_date&quot;: &quot;1989-12-25T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 14,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44d-7262-9f10-99b1db668cfd&quot;,
            &quot;first_name&quot;: &quot;General&quot;,
            &quot;last_name&quot;: &quot;Gusikowski&quot;,
            &quot;full_name&quot;: &quot;General Gusikowski&quot;,
            &quot;birth_date&quot;: &quot;1994-05-05T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 42,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44e-714d-ba0d-857a5b60b052&quot;,
            &quot;first_name&quot;: &quot;Max&quot;,
            &quot;last_name&quot;: &quot;Wyman&quot;,
            &quot;full_name&quot;: &quot;Max Wyman&quot;,
            &quot;birth_date&quot;: &quot;2004-07-12T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 99,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44e-714d-ba0d-857a5baa3021&quot;,
            &quot;first_name&quot;: &quot;Dillon&quot;,
            &quot;last_name&quot;: &quot;Heaney&quot;,
            &quot;full_name&quot;: &quot;Dillon Heaney&quot;,
            &quot;birth_date&quot;: &quot;1999-05-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 79,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44e-714d-ba0d-857a5c17c5b2&quot;,
            &quot;first_name&quot;: &quot;Danny&quot;,
            &quot;last_name&quot;: &quot;Ziemann&quot;,
            &quot;full_name&quot;: &quot;Danny Ziemann&quot;,
            &quot;birth_date&quot;: &quot;1991-05-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 43,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44f-7017-9bbd-06cd5ed5ebaf&quot;,
            &quot;first_name&quot;: &quot;Broderick&quot;,
            &quot;last_name&quot;: &quot;Ebert&quot;,
            &quot;full_name&quot;: &quot;Broderick Ebert&quot;,
            &quot;birth_date&quot;: &quot;2006-05-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 6,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d44f-7017-9bbd-06cd5fc2cfc3&quot;,
            &quot;first_name&quot;: &quot;Devin&quot;,
            &quot;last_name&quot;: &quot;Auer&quot;,
            &quot;full_name&quot;: &quot;Devin Auer&quot;,
            &quot;birth_date&quot;: &quot;2002-06-07T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 21,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d450-7387-839e-314f4c3160f1&quot;,
            &quot;first_name&quot;: &quot;Ethan&quot;,
            &quot;last_name&quot;: &quot;Ernser&quot;,
            &quot;full_name&quot;: &quot;Ethan Ernser&quot;,
            &quot;birth_date&quot;: &quot;1994-09-08T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 2,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d450-7387-839e-314f4c6ed0e0&quot;,
            &quot;first_name&quot;: &quot;Mitchel&quot;,
            &quot;last_name&quot;: &quot;Torp&quot;,
            &quot;full_name&quot;: &quot;Mitchel Torp&quot;,
            &quot;birth_date&quot;: &quot;2006-05-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 88,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d451-72fe-bda5-bf06db99addf&quot;,
            &quot;first_name&quot;: &quot;Henderson&quot;,
            &quot;last_name&quot;: &quot;Harber&quot;,
            &quot;full_name&quot;: &quot;Henderson Harber&quot;,
            &quot;birth_date&quot;: &quot;1986-02-28T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 7,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d451-72fe-bda5-bf06dbbd2a4f&quot;,
            &quot;first_name&quot;: &quot;Corbin&quot;,
            &quot;last_name&quot;: &quot;Abernathy&quot;,
            &quot;full_name&quot;: &quot;Corbin Abernathy&quot;,
            &quot;birth_date&quot;: &quot;1990-09-15T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 11,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d452-723d-aa45-7e9d419fb43f&quot;,
            &quot;first_name&quot;: &quot;Brooks&quot;,
            &quot;last_name&quot;: &quot;Lakin&quot;,
            &quot;full_name&quot;: &quot;Brooks Lakin&quot;,
            &quot;birth_date&quot;: &quot;2003-06-28T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 53,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d452-723d-aa45-7e9d41bf9b7c&quot;,
            &quot;first_name&quot;: &quot;Stevie&quot;,
            &quot;last_name&quot;: &quot;Huel&quot;,
            &quot;full_name&quot;: &quot;Stevie Huel&quot;,
            &quot;birth_date&quot;: &quot;2005-07-14T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 70,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d452-723d-aa45-7e9d428fe96a&quot;,
            &quot;first_name&quot;: &quot;Ramiro&quot;,
            &quot;last_name&quot;: &quot;O&#039;Keefe&quot;,
            &quot;full_name&quot;: &quot;Ramiro O&#039;Keefe&quot;,
            &quot;birth_date&quot;: &quot;1996-03-10T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 94,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d453-7124-8056-ca7a9c329ee1&quot;,
            &quot;first_name&quot;: &quot;Noble&quot;,
            &quot;last_name&quot;: &quot;Collins&quot;,
            &quot;full_name&quot;: &quot;Noble Collins&quot;,
            &quot;birth_date&quot;: &quot;1988-06-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 77,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d453-7124-8056-ca7a9ce9bd58&quot;,
            &quot;first_name&quot;: &quot;Geovanny&quot;,
            &quot;last_name&quot;: &quot;Murphy&quot;,
            &quot;full_name&quot;: &quot;Geovanny Murphy&quot;,
            &quot;birth_date&quot;: &quot;1999-08-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 55,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d44b-72d2-ba5c-5e35c4503e60&quot;,
                &quot;name&quot;: &quot;Wilderman LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbdd?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#ede232&quot;,
                &quot;second_color&quot;: &quot;#cc3107&quot;,
                &quot;year_of_foundation&quot;: 1922,
                &quot;stadium&quot;: &quot;North Jaymechester Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6cca09c3&quot;,
            &quot;first_name&quot;: &quot;Alfonzo&quot;,
            &quot;last_name&quot;: &quot;Stiedemann&quot;,
            &quot;full_name&quot;: &quot;Alfonzo Stiedemann&quot;,
            &quot;birth_date&quot;: &quot;2005-08-07T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 46,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d455-7121-89ac-1426777247dc&quot;,
            &quot;first_name&quot;: &quot;Bertram&quot;,
            &quot;last_name&quot;: &quot;Hayes&quot;,
            &quot;full_name&quot;: &quot;Bertram Hayes&quot;,
            &quot;birth_date&quot;: &quot;2004-04-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 77,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d455-7121-89ac-1426784dcb6f&quot;,
            &quot;first_name&quot;: &quot;Salvador&quot;,
            &quot;last_name&quot;: &quot;Torphy&quot;,
            &quot;full_name&quot;: &quot;Salvador Torphy&quot;,
            &quot;birth_date&quot;: &quot;2006-03-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 54,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d456-722c-b617-80dcceabffc2&quot;,
            &quot;first_name&quot;: &quot;Monroe&quot;,
            &quot;last_name&quot;: &quot;Brakus&quot;,
            &quot;full_name&quot;: &quot;Monroe Brakus&quot;,
            &quot;birth_date&quot;: &quot;1994-10-07T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 33,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d456-722c-b617-80dccef88476&quot;,
            &quot;first_name&quot;: &quot;Perry&quot;,
            &quot;last_name&quot;: &quot;Nolan&quot;,
            &quot;full_name&quot;: &quot;Perry Nolan&quot;,
            &quot;birth_date&quot;: &quot;1996-12-05T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 72,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d457-7205-8488-24a0e5f27fc7&quot;,
            &quot;first_name&quot;: &quot;Wilfredo&quot;,
            &quot;last_name&quot;: &quot;Stanton&quot;,
            &quot;full_name&quot;: &quot;Wilfredo Stanton&quot;,
            &quot;birth_date&quot;: &quot;2004-08-04T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 85,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d457-7205-8488-24a0e6d429ab&quot;,
            &quot;first_name&quot;: &quot;Skye&quot;,
            &quot;last_name&quot;: &quot;Gleason&quot;,
            &quot;full_name&quot;: &quot;Skye Gleason&quot;,
            &quot;birth_date&quot;: &quot;2000-01-01T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 17,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d458-73ee-bd21-db7f7a96c60d&quot;,
            &quot;first_name&quot;: &quot;Cornell&quot;,
            &quot;last_name&quot;: &quot;Carroll&quot;,
            &quot;full_name&quot;: &quot;Cornell Carroll&quot;,
            &quot;birth_date&quot;: &quot;2005-01-23T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 93,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d458-73ee-bd21-db7f7b311188&quot;,
            &quot;first_name&quot;: &quot;Will&quot;,
            &quot;last_name&quot;: &quot;Pfannerstill&quot;,
            &quot;full_name&quot;: &quot;Will Pfannerstill&quot;,
            &quot;birth_date&quot;: &quot;1990-03-30T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 14,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d458-73ee-bd21-db7f7bc46586&quot;,
            &quot;first_name&quot;: &quot;Ambrose&quot;,
            &quot;last_name&quot;: &quot;Mueller&quot;,
            &quot;full_name&quot;: &quot;Ambrose Mueller&quot;,
            &quot;birth_date&quot;: &quot;1991-11-12T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 89,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d459-714c-a49b-236f5be312c4&quot;,
            &quot;first_name&quot;: &quot;Alexys&quot;,
            &quot;last_name&quot;: &quot;Zemlak&quot;,
            &quot;full_name&quot;: &quot;Alexys Zemlak&quot;,
            &quot;birth_date&quot;: &quot;2004-03-23T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 40,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d459-714c-a49b-236f5bfe99d4&quot;,
            &quot;first_name&quot;: &quot;Estevan&quot;,
            &quot;last_name&quot;: &quot;Keebler&quot;,
            &quot;full_name&quot;: &quot;Estevan Keebler&quot;,
            &quot;birth_date&quot;: &quot;1997-04-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 32,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45a-7350-9ed6-30615ec54a52&quot;,
            &quot;first_name&quot;: &quot;Jonatan&quot;,
            &quot;last_name&quot;: &quot;Weimann&quot;,
            &quot;full_name&quot;: &quot;Jonatan Weimann&quot;,
            &quot;birth_date&quot;: &quot;1995-10-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 51,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45a-7350-9ed6-30615f5443e2&quot;,
            &quot;first_name&quot;: &quot;Jordon&quot;,
            &quot;last_name&quot;: &quot;Wilderman&quot;,
            &quot;full_name&quot;: &quot;Jordon Wilderman&quot;,
            &quot;birth_date&quot;: &quot;1991-05-31T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 16,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45b-7087-9c41-1fa93775b904&quot;,
            &quot;first_name&quot;: &quot;Ismael&quot;,
            &quot;last_name&quot;: &quot;Kassulke&quot;,
            &quot;full_name&quot;: &quot;Ismael Kassulke&quot;,
            &quot;birth_date&quot;: &quot;1992-12-30T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 42,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45b-7087-9c41-1fa93791bd6e&quot;,
            &quot;first_name&quot;: &quot;Hadley&quot;,
            &quot;last_name&quot;: &quot;Wisoky&quot;,
            &quot;full_name&quot;: &quot;Hadley Wisoky&quot;,
            &quot;birth_date&quot;: &quot;1988-05-28T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 71,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45b-7087-9c41-1fa9384d2304&quot;,
            &quot;first_name&quot;: &quot;Kay&quot;,
            &quot;last_name&quot;: &quot;Abernathy&quot;,
            &quot;full_name&quot;: &quot;Kay Abernathy&quot;,
            &quot;birth_date&quot;: &quot;1989-07-20T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 97,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45c-73e0-9aa3-941f0911ee95&quot;,
            &quot;first_name&quot;: &quot;Alberto&quot;,
            &quot;last_name&quot;: &quot;O&#039;Conner&quot;,
            &quot;full_name&quot;: &quot;Alberto O&#039;Conner&quot;,
            &quot;birth_date&quot;: &quot;1994-07-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 98,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45c-73e0-9aa3-941f09fe4d84&quot;,
            &quot;first_name&quot;: &quot;Alek&quot;,
            &quot;last_name&quot;: &quot;Barrows&quot;,
            &quot;full_name&quot;: &quot;Alek Barrows&quot;,
            &quot;birth_date&quot;: &quot;1995-10-12T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 59,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45d-7354-b25d-a92d938878a8&quot;,
            &quot;first_name&quot;: &quot;Jerod&quot;,
            &quot;last_name&quot;: &quot;Frami&quot;,
            &quot;full_name&quot;: &quot;Jerod Frami&quot;,
            &quot;birth_date&quot;: &quot;1987-03-24T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 8,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45d-7354-b25d-a92d93b64845&quot;,
            &quot;first_name&quot;: &quot;Kennedi&quot;,
            &quot;last_name&quot;: &quot;Turcotte&quot;,
            &quot;full_name&quot;: &quot;Kennedi Turcotte&quot;,
            &quot;birth_date&quot;: &quot;2006-10-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 81,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d454-73e3-a4da-a55c6c23b859&quot;,
                &quot;name&quot;: &quot;Mertz LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009933?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#9f45f9&quot;,
                &quot;second_color&quot;: &quot;#171de0&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;East Charlene Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004c26d06&quot;,
            &quot;first_name&quot;: &quot;Felix&quot;,
            &quot;last_name&quot;: &quot;Kihn&quot;,
            &quot;full_name&quot;: &quot;Felix Kihn&quot;,
            &quot;birth_date&quot;: &quot;2001-07-30T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 81,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b8900595c6e8&quot;,
            &quot;first_name&quot;: &quot;Heber&quot;,
            &quot;last_name&quot;: &quot;Corwin&quot;,
            &quot;full_name&quot;: &quot;Heber Corwin&quot;,
            &quot;birth_date&quot;: &quot;2007-03-01T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 69,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45f-72d4-8e99-7176f977a526&quot;,
            &quot;first_name&quot;: &quot;Dion&quot;,
            &quot;last_name&quot;: &quot;Ondricka&quot;,
            &quot;full_name&quot;: &quot;Dion Ondricka&quot;,
            &quot;birth_date&quot;: &quot;1991-08-31T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 82,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d45f-72d4-8e99-7176fa77034c&quot;,
            &quot;first_name&quot;: &quot;Derek&quot;,
            &quot;last_name&quot;: &quot;Kovacek&quot;,
            &quot;full_name&quot;: &quot;Derek Kovacek&quot;,
            &quot;birth_date&quot;: &quot;1991-07-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 78,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d460-7189-9ce9-bd01736cdbf7&quot;,
            &quot;first_name&quot;: &quot;Godfrey&quot;,
            &quot;last_name&quot;: &quot;Toy&quot;,
            &quot;full_name&quot;: &quot;Godfrey Toy&quot;,
            &quot;birth_date&quot;: &quot;2001-04-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 16,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d460-7189-9ce9-bd01745b75f4&quot;,
            &quot;first_name&quot;: &quot;Dewayne&quot;,
            &quot;last_name&quot;: &quot;Kuhn&quot;,
            &quot;full_name&quot;: &quot;Dewayne Kuhn&quot;,
            &quot;birth_date&quot;: &quot;1998-11-12T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 48,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d460-7189-9ce9-bd01748d2ca8&quot;,
            &quot;first_name&quot;: &quot;Kristopher&quot;,
            &quot;last_name&quot;: &quot;Vandervort&quot;,
            &quot;full_name&quot;: &quot;Kristopher Vandervort&quot;,
            &quot;birth_date&quot;: &quot;1994-07-23T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 32,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d461-72f7-8eeb-3f24c423df82&quot;,
            &quot;first_name&quot;: &quot;Percy&quot;,
            &quot;last_name&quot;: &quot;Keebler&quot;,
            &quot;full_name&quot;: &quot;Percy Keebler&quot;,
            &quot;birth_date&quot;: &quot;1999-03-29T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 36,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d461-72f7-8eeb-3f24c45c7f37&quot;,
            &quot;first_name&quot;: &quot;Tristian&quot;,
            &quot;last_name&quot;: &quot;Haag&quot;,
            &quot;full_name&quot;: &quot;Tristian Haag&quot;,
            &quot;birth_date&quot;: &quot;2005-04-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 87,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d462-71cd-9678-6058b8b0bc28&quot;,
            &quot;first_name&quot;: &quot;Nicklaus&quot;,
            &quot;last_name&quot;: &quot;Schuppe&quot;,
            &quot;full_name&quot;: &quot;Nicklaus Schuppe&quot;,
            &quot;birth_date&quot;: &quot;1999-03-31T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 44,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d462-71cd-9678-6058b93025ff&quot;,
            &quot;first_name&quot;: &quot;Lloyd&quot;,
            &quot;last_name&quot;: &quot;Klocko&quot;,
            &quot;full_name&quot;: &quot;Lloyd Klocko&quot;,
            &quot;birth_date&quot;: &quot;2007-07-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 99,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d462-71cd-9678-6058b9f7b5b9&quot;,
            &quot;first_name&quot;: &quot;Jaylin&quot;,
            &quot;last_name&quot;: &quot;Okuneva&quot;,
            &quot;full_name&quot;: &quot;Jaylin Okuneva&quot;,
            &quot;birth_date&quot;: &quot;1995-10-20T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 97,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d463-73ae-b9cc-a26da963ccd2&quot;,
            &quot;first_name&quot;: &quot;Kendall&quot;,
            &quot;last_name&quot;: &quot;Bogisich&quot;,
            &quot;full_name&quot;: &quot;Kendall Bogisich&quot;,
            &quot;birth_date&quot;: &quot;2003-06-01T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 15,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d463-73ae-b9cc-a26da9e07046&quot;,
            &quot;first_name&quot;: &quot;Jessie&quot;,
            &quot;last_name&quot;: &quot;Fadel&quot;,
            &quot;full_name&quot;: &quot;Jessie Fadel&quot;,
            &quot;birth_date&quot;: &quot;2005-08-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 2,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d464-723b-b287-af237499c8c1&quot;,
            &quot;first_name&quot;: &quot;Sid&quot;,
            &quot;last_name&quot;: &quot;Abbott&quot;,
            &quot;full_name&quot;: &quot;Sid Abbott&quot;,
            &quot;birth_date&quot;: &quot;1996-10-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 77,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d464-723b-b287-af2374fa8fe6&quot;,
            &quot;first_name&quot;: &quot;Finn&quot;,
            &quot;last_name&quot;: &quot;Franecki&quot;,
            &quot;full_name&quot;: &quot;Finn Franecki&quot;,
            &quot;birth_date&quot;: &quot;2005-03-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 34,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d464-723b-b287-af23758ccdc7&quot;,
            &quot;first_name&quot;: &quot;Rowan&quot;,
            &quot;last_name&quot;: &quot;Spencer&quot;,
            &quot;full_name&quot;: &quot;Rowan Spencer&quot;,
            &quot;birth_date&quot;: &quot;1986-02-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 50,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d465-73b6-ae4f-fdcd3559fe38&quot;,
            &quot;first_name&quot;: &quot;Tommie&quot;,
            &quot;last_name&quot;: &quot;Jones&quot;,
            &quot;full_name&quot;: &quot;Tommie Jones&quot;,
            &quot;birth_date&quot;: &quot;1998-07-22T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 54,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d465-73b6-ae4f-fdcd35c1cdb9&quot;,
            &quot;first_name&quot;: &quot;Cary&quot;,
            &quot;last_name&quot;: &quot;Muller&quot;,
            &quot;full_name&quot;: &quot;Cary Muller&quot;,
            &quot;birth_date&quot;: &quot;1998-11-21T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 26,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d466-7247-a066-52ac17d6dfe9&quot;,
            &quot;first_name&quot;: &quot;Santa&quot;,
            &quot;last_name&quot;: &quot;Boyer&quot;,
            &quot;full_name&quot;: &quot;Santa Boyer&quot;,
            &quot;birth_date&quot;: &quot;1989-12-23T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 73,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d466-7247-a066-52ac1840ce1c&quot;,
            &quot;first_name&quot;: &quot;Marlin&quot;,
            &quot;last_name&quot;: &quot;Bruen&quot;,
            &quot;full_name&quot;: &quot;Marlin Bruen&quot;,
            &quot;birth_date&quot;: &quot;1994-10-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 70,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d466-7247-a066-52ac18e16607&quot;,
            &quot;first_name&quot;: &quot;Steve&quot;,
            &quot;last_name&quot;: &quot;Torp&quot;,
            &quot;full_name&quot;: &quot;Steve Torp&quot;,
            &quot;birth_date&quot;: &quot;1991-11-14T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 68,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632ea96fbc50&quot;,
            &quot;first_name&quot;: &quot;Arno&quot;,
            &quot;last_name&quot;: &quot;Satterfield&quot;,
            &quot;full_name&quot;: &quot;Arno Satterfield&quot;,
            &quot;birth_date&quot;: &quot;2000-12-07T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 66,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d45e-7175-9dea-b89004779faf&quot;,
                &quot;name&quot;: &quot;Kuhic LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb11?text=sports+id&quot;,
                &quot;first_color&quot;: &quot;#106202&quot;,
                &quot;second_color&quot;: &quot;#933e19&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Mathildeton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d468-728f-b014-21ce48e5d1e1&quot;,
            &quot;first_name&quot;: &quot;Emmet&quot;,
            &quot;last_name&quot;: &quot;Bode&quot;,
            &quot;full_name&quot;: &quot;Emmet Bode&quot;,
            &quot;birth_date&quot;: &quot;2005-04-15T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 30,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d468-728f-b014-21ce4910c8ba&quot;,
            &quot;first_name&quot;: &quot;Madyson&quot;,
            &quot;last_name&quot;: &quot;Bins&quot;,
            &quot;full_name&quot;: &quot;Madyson Bins&quot;,
            &quot;birth_date&quot;: &quot;2003-05-07T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 63,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d468-728f-b014-21ce498fc037&quot;,
            &quot;first_name&quot;: &quot;Marlin&quot;,
            &quot;last_name&quot;: &quot;Wisoky&quot;,
            &quot;full_name&quot;: &quot;Marlin Wisoky&quot;,
            &quot;birth_date&quot;: &quot;2006-09-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 1,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d469-7067-bc9a-b5358725f585&quot;,
            &quot;first_name&quot;: &quot;Selmer&quot;,
            &quot;last_name&quot;: &quot;Schroeder&quot;,
            &quot;full_name&quot;: &quot;Selmer Schroeder&quot;,
            &quot;birth_date&quot;: &quot;1996-05-14T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 33,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46a-71b8-a513-cc364dbbdd82&quot;,
            &quot;first_name&quot;: &quot;Maurice&quot;,
            &quot;last_name&quot;: &quot;Ernser&quot;,
            &quot;full_name&quot;: &quot;Maurice Ernser&quot;,
            &quot;birth_date&quot;: &quot;1985-08-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 76,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46a-71b8-a513-cc364e7842b3&quot;,
            &quot;first_name&quot;: &quot;Zane&quot;,
            &quot;last_name&quot;: &quot;Swift&quot;,
            &quot;full_name&quot;: &quot;Zane Swift&quot;,
            &quot;birth_date&quot;: &quot;1987-08-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 24,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46a-71b8-a513-cc364f3e96f8&quot;,
            &quot;first_name&quot;: &quot;Jovanny&quot;,
            &quot;last_name&quot;: &quot;Macejkovic&quot;,
            &quot;full_name&quot;: &quot;Jovanny Macejkovic&quot;,
            &quot;birth_date&quot;: &quot;1999-09-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 91,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46b-7314-bf9d-ed94cadc12ef&quot;,
            &quot;first_name&quot;: &quot;Stephen&quot;,
            &quot;last_name&quot;: &quot;Thiel&quot;,
            &quot;full_name&quot;: &quot;Stephen Thiel&quot;,
            &quot;birth_date&quot;: &quot;2003-09-14T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 23,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46b-7314-bf9d-ed94cb3eb960&quot;,
            &quot;first_name&quot;: &quot;Kaley&quot;,
            &quot;last_name&quot;: &quot;Fay&quot;,
            &quot;full_name&quot;: &quot;Kaley Fay&quot;,
            &quot;birth_date&quot;: &quot;2000-03-13T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 2,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46c-7379-a629-eb14eb06978c&quot;,
            &quot;first_name&quot;: &quot;Clemens&quot;,
            &quot;last_name&quot;: &quot;Gulgowski&quot;,
            &quot;full_name&quot;: &quot;Clemens Gulgowski&quot;,
            &quot;birth_date&quot;: &quot;1992-05-30T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 37,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46c-7379-a629-eb14ebd35bd9&quot;,
            &quot;first_name&quot;: &quot;Haskell&quot;,
            &quot;last_name&quot;: &quot;Schowalter&quot;,
            &quot;full_name&quot;: &quot;Haskell Schowalter&quot;,
            &quot;birth_date&quot;: &quot;1994-06-22T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 62,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46c-7379-a629-eb14ec9ce35d&quot;,
            &quot;first_name&quot;: &quot;Cristina&quot;,
            &quot;last_name&quot;: &quot;Schmidt&quot;,
            &quot;full_name&quot;: &quot;Cristina Schmidt&quot;,
            &quot;birth_date&quot;: &quot;1988-07-04T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 65,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46d-7298-9bfe-cd2df905a2b0&quot;,
            &quot;first_name&quot;: &quot;Johnny&quot;,
            &quot;last_name&quot;: &quot;Ziemann&quot;,
            &quot;full_name&quot;: &quot;Johnny Ziemann&quot;,
            &quot;birth_date&quot;: &quot;1990-01-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 89,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46d-7298-9bfe-cd2df99390bb&quot;,
            &quot;first_name&quot;: &quot;Lance&quot;,
            &quot;last_name&quot;: &quot;Braun&quot;,
            &quot;full_name&quot;: &quot;Lance Braun&quot;,
            &quot;birth_date&quot;: &quot;2003-11-10T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 97,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46d-7298-9bfe-cd2dfa263490&quot;,
            &quot;first_name&quot;: &quot;Abdullah&quot;,
            &quot;last_name&quot;: &quot;Ward&quot;,
            &quot;full_name&quot;: &quot;Abdullah Ward&quot;,
            &quot;birth_date&quot;: &quot;2001-10-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 7,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46e-7267-a104-0f89735b9478&quot;,
            &quot;first_name&quot;: &quot;Morris&quot;,
            &quot;last_name&quot;: &quot;King&quot;,
            &quot;full_name&quot;: &quot;Morris King&quot;,
            &quot;birth_date&quot;: &quot;1992-09-04T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 70,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46e-7267-a104-0f89741a0ba0&quot;,
            &quot;first_name&quot;: &quot;Joaquin&quot;,
            &quot;last_name&quot;: &quot;Wyman&quot;,
            &quot;full_name&quot;: &quot;Joaquin Wyman&quot;,
            &quot;birth_date&quot;: &quot;1993-06-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 12,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46f-7134-93d2-a1c6d3fe0d39&quot;,
            &quot;first_name&quot;: &quot;Zackery&quot;,
            &quot;last_name&quot;: &quot;Labadie&quot;,
            &quot;full_name&quot;: &quot;Zackery Labadie&quot;,
            &quot;birth_date&quot;: &quot;1994-01-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 83,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46f-7134-93d2-a1c6d4145187&quot;,
            &quot;first_name&quot;: &quot;Abdul&quot;,
            &quot;last_name&quot;: &quot;Haley&quot;,
            &quot;full_name&quot;: &quot;Abdul Haley&quot;,
            &quot;birth_date&quot;: &quot;1986-12-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 32,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d46f-7134-93d2-a1c6d480ddb0&quot;,
            &quot;first_name&quot;: &quot;Guillermo&quot;,
            &quot;last_name&quot;: &quot;Schmidt&quot;,
            &quot;full_name&quot;: &quot;Guillermo Schmidt&quot;,
            &quot;birth_date&quot;: &quot;1995-01-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 93,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d470-702c-b731-a4647c949c90&quot;,
            &quot;first_name&quot;: &quot;Louie&quot;,
            &quot;last_name&quot;: &quot;Willms&quot;,
            &quot;full_name&quot;: &quot;Louie Willms&quot;,
            &quot;birth_date&quot;: &quot;2003-03-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 47,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d470-702c-b731-a4647d6b33aa&quot;,
            &quot;first_name&quot;: &quot;Jarrett&quot;,
            &quot;last_name&quot;: &quot;Parker&quot;,
            &quot;full_name&quot;: &quot;Jarrett Parker&quot;,
            &quot;birth_date&quot;: &quot;1991-07-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 35,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d470-702c-b731-a4647d88ced5&quot;,
            &quot;first_name&quot;: &quot;Misael&quot;,
            &quot;last_name&quot;: &quot;Wiza&quot;,
            &quot;full_name&quot;: &quot;Misael Wiza&quot;,
            &quot;birth_date&quot;: &quot;2002-01-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 81,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba913e2ae61&quot;,
            &quot;first_name&quot;: &quot;Durward&quot;,
            &quot;last_name&quot;: &quot;Abbott&quot;,
            &quot;full_name&quot;: &quot;Durward Abbott&quot;,
            &quot;birth_date&quot;: &quot;1998-09-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 74,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d467-715c-afce-632eaa41e540&quot;,
                &quot;name&quot;: &quot;McGlynn-Deckow&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+est&quot;,
                &quot;first_color&quot;: &quot;#ae6598&quot;,
                &quot;second_color&quot;: &quot;#715135&quot;,
                &quot;year_of_foundation&quot;: 2012,
                &quot;stadium&quot;: &quot;Sophiemouth Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d472-7399-ad19-4bbe0f10c504&quot;,
            &quot;first_name&quot;: &quot;Cruz&quot;,
            &quot;last_name&quot;: &quot;Flatley&quot;,
            &quot;full_name&quot;: &quot;Cruz Flatley&quot;,
            &quot;birth_date&quot;: &quot;1987-02-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 70,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d472-7399-ad19-4bbe0f834135&quot;,
            &quot;first_name&quot;: &quot;Vernon&quot;,
            &quot;last_name&quot;: &quot;Berge&quot;,
            &quot;full_name&quot;: &quot;Vernon Berge&quot;,
            &quot;birth_date&quot;: &quot;1990-10-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 25,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d473-7224-8d73-06501d921ecc&quot;,
            &quot;first_name&quot;: &quot;Montana&quot;,
            &quot;last_name&quot;: &quot;Green&quot;,
            &quot;full_name&quot;: &quot;Montana Green&quot;,
            &quot;birth_date&quot;: &quot;1989-06-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 73,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d473-7224-8d73-06501e4e732e&quot;,
            &quot;first_name&quot;: &quot;Gunner&quot;,
            &quot;last_name&quot;: &quot;Erdman&quot;,
            &quot;full_name&quot;: &quot;Gunner Erdman&quot;,
            &quot;birth_date&quot;: &quot;2002-05-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 40,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d473-7224-8d73-06501e5fbeb3&quot;,
            &quot;first_name&quot;: &quot;Milo&quot;,
            &quot;last_name&quot;: &quot;Funk&quot;,
            &quot;full_name&quot;: &quot;Milo Funk&quot;,
            &quot;birth_date&quot;: &quot;2007-02-24T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 77,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d474-73a7-9f08-146daaaa703a&quot;,
            &quot;first_name&quot;: &quot;Travon&quot;,
            &quot;last_name&quot;: &quot;Senger&quot;,
            &quot;full_name&quot;: &quot;Travon Senger&quot;,
            &quot;birth_date&quot;: &quot;1992-10-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 50,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d474-73a7-9f08-146dab90f02e&quot;,
            &quot;first_name&quot;: &quot;Amari&quot;,
            &quot;last_name&quot;: &quot;Donnelly&quot;,
            &quot;full_name&quot;: &quot;Amari Donnelly&quot;,
            &quot;birth_date&quot;: &quot;1998-07-21T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 53,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d474-73a7-9f08-146dac36551a&quot;,
            &quot;first_name&quot;: &quot;Brennon&quot;,
            &quot;last_name&quot;: &quot;Haag&quot;,
            &quot;full_name&quot;: &quot;Brennon Haag&quot;,
            &quot;birth_date&quot;: &quot;1997-04-12T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 58,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d475-72f0-86ff-c2b01208e97e&quot;,
            &quot;first_name&quot;: &quot;Keshawn&quot;,
            &quot;last_name&quot;: &quot;Jerde&quot;,
            &quot;full_name&quot;: &quot;Keshawn Jerde&quot;,
            &quot;birth_date&quot;: &quot;1985-11-20T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 4,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d475-72f0-86ff-c2b0122367ad&quot;,
            &quot;first_name&quot;: &quot;Omari&quot;,
            &quot;last_name&quot;: &quot;Kihn&quot;,
            &quot;full_name&quot;: &quot;Omari Kihn&quot;,
            &quot;birth_date&quot;: &quot;2000-06-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 13,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d476-733e-970b-894b67ad6ffd&quot;,
            &quot;first_name&quot;: &quot;Timmothy&quot;,
            &quot;last_name&quot;: &quot;Smitham&quot;,
            &quot;full_name&quot;: &quot;Timmothy Smitham&quot;,
            &quot;birth_date&quot;: &quot;1999-10-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 7,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d476-733e-970b-894b687688c0&quot;,
            &quot;first_name&quot;: &quot;Josh&quot;,
            &quot;last_name&quot;: &quot;Hettinger&quot;,
            &quot;full_name&quot;: &quot;Josh Hettinger&quot;,
            &quot;birth_date&quot;: &quot;1999-10-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 57,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d476-733e-970b-894b68f9e99d&quot;,
            &quot;first_name&quot;: &quot;Jimmy&quot;,
            &quot;last_name&quot;: &quot;Mills&quot;,
            &quot;full_name&quot;: &quot;Jimmy Mills&quot;,
            &quot;birth_date&quot;: &quot;1995-04-10T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 97,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d477-733c-82bb-74889a3959d7&quot;,
            &quot;first_name&quot;: &quot;Alexander&quot;,
            &quot;last_name&quot;: &quot;Weimann&quot;,
            &quot;full_name&quot;: &quot;Alexander Weimann&quot;,
            &quot;birth_date&quot;: &quot;2004-01-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 75,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d477-733c-82bb-74889af02670&quot;,
            &quot;first_name&quot;: &quot;Karson&quot;,
            &quot;last_name&quot;: &quot;Tromp&quot;,
            &quot;full_name&quot;: &quot;Karson Tromp&quot;,
            &quot;birth_date&quot;: &quot;1996-10-17T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 20,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d477-733c-82bb-74889b65a5b1&quot;,
            &quot;first_name&quot;: &quot;Dusty&quot;,
            &quot;last_name&quot;: &quot;Ullrich&quot;,
            &quot;full_name&quot;: &quot;Dusty Ullrich&quot;,
            &quot;birth_date&quot;: &quot;1985-11-10T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 39,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d478-7218-a0bb-a98e9a77b644&quot;,
            &quot;first_name&quot;: &quot;Dexter&quot;,
            &quot;last_name&quot;: &quot;Rogahn&quot;,
            &quot;full_name&quot;: &quot;Dexter Rogahn&quot;,
            &quot;birth_date&quot;: &quot;1996-03-12T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 19,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d478-7218-a0bb-a98e9afc1d8b&quot;,
            &quot;first_name&quot;: &quot;Carol&quot;,
            &quot;last_name&quot;: &quot;Douglas&quot;,
            &quot;full_name&quot;: &quot;Carol Douglas&quot;,
            &quot;birth_date&quot;: &quot;1994-06-25T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 30,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d479-73e5-90fb-262af7045965&quot;,
            &quot;first_name&quot;: &quot;Issac&quot;,
            &quot;last_name&quot;: &quot;Crona&quot;,
            &quot;full_name&quot;: &quot;Issac Crona&quot;,
            &quot;birth_date&quot;: &quot;1991-04-24T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 33,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d479-73e5-90fb-262af7342399&quot;,
            &quot;first_name&quot;: &quot;Arnold&quot;,
            &quot;last_name&quot;: &quot;Tillman&quot;,
            &quot;full_name&quot;: &quot;Arnold Tillman&quot;,
            &quot;birth_date&quot;: &quot;1998-02-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 92,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d479-73e5-90fb-262af758ba6c&quot;,
            &quot;first_name&quot;: &quot;Reese&quot;,
            &quot;last_name&quot;: &quot;Graham&quot;,
            &quot;full_name&quot;: &quot;Reese Graham&quot;,
            &quot;birth_date&quot;: &quot;1986-12-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 74,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47a-72ff-aa6e-35ece7fa2b49&quot;,
            &quot;first_name&quot;: &quot;Hazle&quot;,
            &quot;last_name&quot;: &quot;Kessler&quot;,
            &quot;full_name&quot;: &quot;Hazle Kessler&quot;,
            &quot;birth_date&quot;: &quot;1996-10-13T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 45,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47a-72ff-aa6e-35ece85a15ec&quot;,
            &quot;first_name&quot;: &quot;Santa&quot;,
            &quot;last_name&quot;: &quot;Schultz&quot;,
            &quot;full_name&quot;: &quot;Santa Schultz&quot;,
            &quot;birth_date&quot;: &quot;2000-07-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 28,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47a-72ff-aa6e-35ece929b788&quot;,
            &quot;first_name&quot;: &quot;Mohammed&quot;,
            &quot;last_name&quot;: &quot;Heller&quot;,
            &quot;full_name&quot;: &quot;Mohammed Heller&quot;,
            &quot;birth_date&quot;: &quot;1988-12-08T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 12,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a608792f3&quot;,
            &quot;first_name&quot;: &quot;Domenick&quot;,
            &quot;last_name&quot;: &quot;Farrell&quot;,
            &quot;full_name&quot;: &quot;Domenick Farrell&quot;,
            &quot;birth_date&quot;: &quot;2002-08-28T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 58,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47c-71e8-b573-b6584b3c83eb&quot;,
            &quot;first_name&quot;: &quot;Elwyn&quot;,
            &quot;last_name&quot;: &quot;Kreiger&quot;,
            &quot;full_name&quot;: &quot;Elwyn Kreiger&quot;,
            &quot;birth_date&quot;: &quot;1996-03-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 83,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47c-71e8-b573-b6584b4b9e38&quot;,
            &quot;first_name&quot;: &quot;Wilson&quot;,
            &quot;last_name&quot;: &quot;Wisoky&quot;,
            &quot;full_name&quot;: &quot;Wilson Wisoky&quot;,
            &quot;birth_date&quot;: &quot;1990-05-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 1,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47c-71e8-b573-b6584c2d46b3&quot;,
            &quot;first_name&quot;: &quot;Alberto&quot;,
            &quot;last_name&quot;: &quot;Wilkinson&quot;,
            &quot;full_name&quot;: &quot;Alberto Wilkinson&quot;,
            &quot;birth_date&quot;: &quot;2000-04-25T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 4,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47d-7119-bfc9-6fea1249eaa6&quot;,
            &quot;first_name&quot;: &quot;Buddy&quot;,
            &quot;last_name&quot;: &quot;VonRueden&quot;,
            &quot;full_name&quot;: &quot;Buddy VonRueden&quot;,
            &quot;birth_date&quot;: &quot;1990-01-22T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 29,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47d-7119-bfc9-6fea127958a1&quot;,
            &quot;first_name&quot;: &quot;Alfonso&quot;,
            &quot;last_name&quot;: &quot;Schulist&quot;,
            &quot;full_name&quot;: &quot;Alfonso Schulist&quot;,
            &quot;birth_date&quot;: &quot;2005-12-06T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 79,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47d-7119-bfc9-6fea12a794a0&quot;,
            &quot;first_name&quot;: &quot;Drake&quot;,
            &quot;last_name&quot;: &quot;Keeling&quot;,
            &quot;full_name&quot;: &quot;Drake Keeling&quot;,
            &quot;birth_date&quot;: &quot;1995-07-28T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 42,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47e-71be-bde9-ec34092332a5&quot;,
            &quot;first_name&quot;: &quot;Brannon&quot;,
            &quot;last_name&quot;: &quot;Raynor&quot;,
            &quot;full_name&quot;: &quot;Brannon Raynor&quot;,
            &quot;birth_date&quot;: &quot;2005-05-31T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 32,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47e-71be-bde9-ec3409aa3061&quot;,
            &quot;first_name&quot;: &quot;Noah&quot;,
            &quot;last_name&quot;: &quot;Muller&quot;,
            &quot;full_name&quot;: &quot;Noah Muller&quot;,
            &quot;birth_date&quot;: &quot;1992-03-08T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 95,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47e-71be-bde9-ec3409e04f99&quot;,
            &quot;first_name&quot;: &quot;Miller&quot;,
            &quot;last_name&quot;: &quot;Cummings&quot;,
            &quot;full_name&quot;: &quot;Miller Cummings&quot;,
            &quot;birth_date&quot;: &quot;2006-06-18T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 19,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47f-706c-be2a-1e77872761de&quot;,
            &quot;first_name&quot;: &quot;Bernard&quot;,
            &quot;last_name&quot;: &quot;Reichel&quot;,
            &quot;full_name&quot;: &quot;Bernard Reichel&quot;,
            &quot;birth_date&quot;: &quot;2003-01-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 17,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47f-706c-be2a-1e778733096f&quot;,
            &quot;first_name&quot;: &quot;Eliezer&quot;,
            &quot;last_name&quot;: &quot;Stark&quot;,
            &quot;full_name&quot;: &quot;Eliezer Stark&quot;,
            &quot;birth_date&quot;: &quot;1990-05-23T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 31,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d47f-706c-be2a-1e77876adece&quot;,
            &quot;first_name&quot;: &quot;Odell&quot;,
            &quot;last_name&quot;: &quot;Murray&quot;,
            &quot;full_name&quot;: &quot;Odell Murray&quot;,
            &quot;birth_date&quot;: &quot;1997-10-03T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 50,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d480-72e9-a8df-4699e903433e&quot;,
            &quot;first_name&quot;: &quot;Gunner&quot;,
            &quot;last_name&quot;: &quot;Harber&quot;,
            &quot;full_name&quot;: &quot;Gunner Harber&quot;,
            &quot;birth_date&quot;: &quot;1986-03-01T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 69,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d480-72e9-a8df-4699e961b2a8&quot;,
            &quot;first_name&quot;: &quot;Wilton&quot;,
            &quot;last_name&quot;: &quot;Quigley&quot;,
            &quot;full_name&quot;: &quot;Wilton Quigley&quot;,
            &quot;birth_date&quot;: &quot;1987-12-09T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 62,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d480-72e9-a8df-4699ea3a4510&quot;,
            &quot;first_name&quot;: &quot;Joey&quot;,
            &quot;last_name&quot;: &quot;Morar&quot;,
            &quot;full_name&quot;: &quot;Joey Morar&quot;,
            &quot;birth_date&quot;: &quot;1998-12-07T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 38,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d481-73d4-bb41-505e508e0bfe&quot;,
            &quot;first_name&quot;: &quot;Salvatore&quot;,
            &quot;last_name&quot;: &quot;Carroll&quot;,
            &quot;full_name&quot;: &quot;Salvatore Carroll&quot;,
            &quot;birth_date&quot;: &quot;1997-12-05T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 53,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d481-73d4-bb41-505e513c41a7&quot;,
            &quot;first_name&quot;: &quot;Esteban&quot;,
            &quot;last_name&quot;: &quot;Kuhic&quot;,
            &quot;full_name&quot;: &quot;Esteban Kuhic&quot;,
            &quot;birth_date&quot;: &quot;1992-08-15T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 92,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d482-70fc-9591-9ca06331b9c8&quot;,
            &quot;first_name&quot;: &quot;Aric&quot;,
            &quot;last_name&quot;: &quot;Cummings&quot;,
            &quot;full_name&quot;: &quot;Aric Cummings&quot;,
            &quot;birth_date&quot;: &quot;1991-08-08T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 9,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d482-70fc-9591-9ca063c89a81&quot;,
            &quot;first_name&quot;: &quot;Kareem&quot;,
            &quot;last_name&quot;: &quot;Runolfsdottir&quot;,
            &quot;full_name&quot;: &quot;Kareem Runolfsdottir&quot;,
            &quot;birth_date&quot;: &quot;1996-01-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 25,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d482-70fc-9591-9ca063d4597d&quot;,
            &quot;first_name&quot;: &quot;Macey&quot;,
            &quot;last_name&quot;: &quot;Walker&quot;,
            &quot;full_name&quot;: &quot;Macey Walker&quot;,
            &quot;birth_date&quot;: &quot;1993-05-01T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 59,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d483-7245-8a75-985915894be9&quot;,
            &quot;first_name&quot;: &quot;Chandler&quot;,
            &quot;last_name&quot;: &quot;Hickle&quot;,
            &quot;full_name&quot;: &quot;Chandler Hickle&quot;,
            &quot;birth_date&quot;: &quot;1988-07-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 3,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d483-7245-8a75-985916274c7a&quot;,
            &quot;first_name&quot;: &quot;Casimer&quot;,
            &quot;last_name&quot;: &quot;Schoen&quot;,
            &quot;full_name&quot;: &quot;Casimer Schoen&quot;,
            &quot;birth_date&quot;: &quot;1989-08-23T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 87,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d483-7245-8a75-9859166d95d1&quot;,
            &quot;first_name&quot;: &quot;Jalen&quot;,
            &quot;last_name&quot;: &quot;Kautzer&quot;,
            &quot;full_name&quot;: &quot;Jalen Kautzer&quot;,
            &quot;birth_date&quot;: &quot;1989-03-30T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 76,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e0393c7ce&quot;,
            &quot;first_name&quot;: &quot;Ignatius&quot;,
            &quot;last_name&quot;: &quot;Lockman&quot;,
            &quot;full_name&quot;: &quot;Ignatius Lockman&quot;,
            &quot;birth_date&quot;: &quot;1994-05-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 65,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042f479e&quot;,
            &quot;first_name&quot;: &quot;Dominic&quot;,
            &quot;last_name&quot;: &quot;Larkin&quot;,
            &quot;full_name&quot;: &quot;Dominic Larkin&quot;,
            &quot;birth_date&quot;: &quot;2003-10-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 58,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d485-718e-97a2-2e06e1811e1d&quot;,
            &quot;first_name&quot;: &quot;Mekhi&quot;,
            &quot;last_name&quot;: &quot;Schuppe&quot;,
            &quot;full_name&quot;: &quot;Mekhi Schuppe&quot;,
            &quot;birth_date&quot;: &quot;2006-07-10T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 30,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d485-718e-97a2-2e06e274a593&quot;,
            &quot;first_name&quot;: &quot;Gordon&quot;,
            &quot;last_name&quot;: &quot;Gibson&quot;,
            &quot;full_name&quot;: &quot;Gordon Gibson&quot;,
            &quot;birth_date&quot;: &quot;1990-02-14T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 21,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d485-718e-97a2-2e06e35db9fc&quot;,
            &quot;first_name&quot;: &quot;Broderick&quot;,
            &quot;last_name&quot;: &quot;Nicolas&quot;,
            &quot;full_name&quot;: &quot;Broderick Nicolas&quot;,
            &quot;birth_date&quot;: &quot;2003-09-04T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 11,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d486-7022-aacc-3782d848aa66&quot;,
            &quot;first_name&quot;: &quot;Danial&quot;,
            &quot;last_name&quot;: &quot;Connelly&quot;,
            &quot;full_name&quot;: &quot;Danial Connelly&quot;,
            &quot;birth_date&quot;: &quot;1989-11-23T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 39,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d486-7022-aacc-3782d85a851e&quot;,
            &quot;first_name&quot;: &quot;Abdullah&quot;,
            &quot;last_name&quot;: &quot;Feest&quot;,
            &quot;full_name&quot;: &quot;Abdullah Feest&quot;,
            &quot;birth_date&quot;: &quot;1994-03-11T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 63,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d486-7022-aacc-3782d8b53f43&quot;,
            &quot;first_name&quot;: &quot;Cade&quot;,
            &quot;last_name&quot;: &quot;Greenfelder&quot;,
            &quot;full_name&quot;: &quot;Cade Greenfelder&quot;,
            &quot;birth_date&quot;: &quot;1989-04-10T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 54,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d487-70d5-9c51-ae68e35243f2&quot;,
            &quot;first_name&quot;: &quot;Noel&quot;,
            &quot;last_name&quot;: &quot;Konopelski&quot;,
            &quot;full_name&quot;: &quot;Noel Konopelski&quot;,
            &quot;birth_date&quot;: &quot;2006-05-07T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 93,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d487-70d5-9c51-ae68e3e76c5b&quot;,
            &quot;first_name&quot;: &quot;Lawson&quot;,
            &quot;last_name&quot;: &quot;Kemmer&quot;,
            &quot;full_name&quot;: &quot;Lawson Kemmer&quot;,
            &quot;birth_date&quot;: &quot;1994-02-01T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 44,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d487-70d5-9c51-ae68e47f7498&quot;,
            &quot;first_name&quot;: &quot;Casey&quot;,
            &quot;last_name&quot;: &quot;Hoppe&quot;,
            &quot;full_name&quot;: &quot;Casey Hoppe&quot;,
            &quot;birth_date&quot;: &quot;1993-09-28T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 33,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d488-7246-870d-a8d585136cca&quot;,
            &quot;first_name&quot;: &quot;Henderson&quot;,
            &quot;last_name&quot;: &quot;Hessel&quot;,
            &quot;full_name&quot;: &quot;Henderson Hessel&quot;,
            &quot;birth_date&quot;: &quot;2007-06-24T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 32,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d488-7246-870d-a8d585194b5f&quot;,
            &quot;first_name&quot;: &quot;Jayce&quot;,
            &quot;last_name&quot;: &quot;Davis&quot;,
            &quot;full_name&quot;: &quot;Jayce Davis&quot;,
            &quot;birth_date&quot;: &quot;1999-02-12T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 34,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d488-7246-870d-a8d58549d917&quot;,
            &quot;first_name&quot;: &quot;Paxton&quot;,
            &quot;last_name&quot;: &quot;Roberts&quot;,
            &quot;full_name&quot;: &quot;Paxton Roberts&quot;,
            &quot;birth_date&quot;: &quot;2001-07-30T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 2,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d489-705f-8fd0-ef7c83d5ef11&quot;,
            &quot;first_name&quot;: &quot;Cortez&quot;,
            &quot;last_name&quot;: &quot;Dicki&quot;,
            &quot;full_name&quot;: &quot;Cortez Dicki&quot;,
            &quot;birth_date&quot;: &quot;1997-07-26T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 75,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d489-705f-8fd0-ef7c8411980f&quot;,
            &quot;first_name&quot;: &quot;Humberto&quot;,
            &quot;last_name&quot;: &quot;Langworth&quot;,
            &quot;full_name&quot;: &quot;Humberto Langworth&quot;,
            &quot;birth_date&quot;: &quot;1991-06-12T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 16,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d489-705f-8fd0-ef7c84deaeb7&quot;,
            &quot;first_name&quot;: &quot;Ambrose&quot;,
            &quot;last_name&quot;: &quot;Morissette&quot;,
            &quot;full_name&quot;: &quot;Ambrose Morissette&quot;,
            &quot;birth_date&quot;: &quot;1997-06-25T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 91,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d48a-7098-b7f4-e31dc6ce5f95&quot;,
            &quot;first_name&quot;: &quot;Fred&quot;,
            &quot;last_name&quot;: &quot;Denesik&quot;,
            &quot;full_name&quot;: &quot;Fred Denesik&quot;,
            &quot;birth_date&quot;: &quot;2006-12-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 88,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d48a-7098-b7f4-e31dc70a57db&quot;,
            &quot;first_name&quot;: &quot;Darwin&quot;,
            &quot;last_name&quot;: &quot;Thompson&quot;,
            &quot;full_name&quot;: &quot;Darwin Thompson&quot;,
            &quot;birth_date&quot;: &quot;2001-07-23T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 45,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d48a-7098-b7f4-e31dc724be9a&quot;,
            &quot;first_name&quot;: &quot;Robbie&quot;,
            &quot;last_name&quot;: &quot;King&quot;,
            &quot;full_name&quot;: &quot;Robbie King&quot;,
            &quot;birth_date&quot;: &quot;1994-08-17T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 20,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d48b-7224-bd80-068e355b295b&quot;,
            &quot;first_name&quot;: &quot;Fritz&quot;,
            &quot;last_name&quot;: &quot;Bins&quot;,
            &quot;full_name&quot;: &quot;Fritz Bins&quot;,
            &quot;birth_date&quot;: &quot;2005-08-10T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 1,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d48b-7224-bd80-068e364998d4&quot;,
            &quot;first_name&quot;: &quot;Boris&quot;,
            &quot;last_name&quot;: &quot;Hills&quot;,
            &quot;full_name&quot;: &quot;Boris Hills&quot;,
            &quot;birth_date&quot;: &quot;2005-11-08T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 24,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d48c-705b-81cf-afde8ac34699&quot;,
            &quot;first_name&quot;: &quot;Winston&quot;,
            &quot;last_name&quot;: &quot;Hamill&quot;,
            &quot;full_name&quot;: &quot;Winston Hamill&quot;,
            &quot;birth_date&quot;: &quot;2004-11-10T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 59,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d48c-705b-81cf-afde8b0d4451&quot;,
            &quot;first_name&quot;: &quot;Jerrod&quot;,
            &quot;last_name&quot;: &quot;Cartwright&quot;,
            &quot;full_name&quot;: &quot;Jerrod Cartwright&quot;,
            &quot;birth_date&quot;: &quot;2000-01-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 10,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d48c-705b-81cf-afde8b7a0bc4&quot;,
            &quot;first_name&quot;: &quot;Trystan&quot;,
            &quot;last_name&quot;: &quot;Keebler&quot;,
            &quot;full_name&quot;: &quot;Trystan Keebler&quot;,
            &quot;birth_date&quot;: &quot;2005-08-04T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 70,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d48d-732a-aeab-d47d607362bf&quot;,
            &quot;first_name&quot;: &quot;General&quot;,
            &quot;last_name&quot;: &quot;Hyatt&quot;,
            &quot;full_name&quot;: &quot;General Hyatt&quot;,
            &quot;birth_date&quot;: &quot;1988-06-07T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 15,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d484-70f4-a6c9-b17e042b5dd7&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dd33?text=sports+exercitationem&quot;,
                &quot;first_color&quot;: &quot;#5a92e7&quot;,
                &quot;second_color&quot;: &quot;#f2962e&quot;,
                &quot;year_of_foundation&quot;: 1949,
                &quot;stadium&quot;: &quot;Medhurstville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b6-7006-a726-1eb0eb2ed079&quot;,
            &quot;first_name&quot;: &quot;Hans&quot;,
            &quot;last_name&quot;: &quot;Kub&quot;,
            &quot;full_name&quot;: &quot;Hans Kub&quot;,
            &quot;birth_date&quot;: &quot;1987-09-10T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 61,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe1ec0509&quot;,
                &quot;name&quot;: &quot;Schmidt-Jones&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0099dd?text=sports+eius&quot;,
                &quot;first_color&quot;: &quot;#f85802&quot;,
                &quot;second_color&quot;: &quot;#8bbd6e&quot;,
                &quot;year_of_foundation&quot;: 1951,
                &quot;stadium&quot;: &quot;Port Suzanne Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b6-7006-a726-1eb0ec0f12f1&quot;,
            &quot;first_name&quot;: &quot;Josiah&quot;,
            &quot;last_name&quot;: &quot;Brakus&quot;,
            &quot;full_name&quot;: &quot;Josiah Brakus&quot;,
            &quot;birth_date&quot;: &quot;1997-02-02T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 54,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4a4-7359-8396-f5732a196158&quot;,
                &quot;name&quot;: &quot;Olson-Bashirian&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0066ee?text=sports+vero&quot;,
                &quot;first_color&quot;: &quot;#7b6611&quot;,
                &quot;second_color&quot;: &quot;#31f1a0&quot;,
                &quot;year_of_foundation&quot;: 2021,
                &quot;stadium&quot;: &quot;Carterside Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b7-7163-bf96-87178e48ddda&quot;,
            &quot;first_name&quot;: &quot;Austen&quot;,
            &quot;last_name&quot;: &quot;Collins&quot;,
            &quot;full_name&quot;: &quot;Austen Collins&quot;,
            &quot;birth_date&quot;: &quot;2005-03-07T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 78,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4a3-7249-9e67-75ec170f4edd&quot;,
                &quot;name&quot;: &quot;Morar Group&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb55?text=sports+iste&quot;,
                &quot;first_color&quot;: &quot;#a6cf6b&quot;,
                &quot;second_color&quot;: &quot;#c0cbcf&quot;,
                &quot;year_of_foundation&quot;: 2013,
                &quot;stadium&quot;: &quot;Schustertown Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b8-71a6-8aac-5ebb07030962&quot;,
            &quot;first_name&quot;: &quot;Neal&quot;,
            &quot;last_name&quot;: &quot;Nienow&quot;,
            &quot;full_name&quot;: &quot;Neal Nienow&quot;,
            &quot;birth_date&quot;: &quot;2000-08-30T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 81,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d49d-704b-a924-77f012cea5b5&quot;,
                &quot;name&quot;: &quot;Hartmann, Balistreri and Crist&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+sint&quot;,
                &quot;first_color&quot;: &quot;#214642&quot;,
                &quot;second_color&quot;: &quot;#3e609e&quot;,
                &quot;year_of_foundation&quot;: 1952,
                &quot;stadium&quot;: &quot;Batzton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b8-71a6-8aac-5ebb073e0e40&quot;,
            &quot;first_name&quot;: &quot;Dudley&quot;,
            &quot;last_name&quot;: &quot;Trantow&quot;,
            &quot;full_name&quot;: &quot;Dudley Trantow&quot;,
            &quot;birth_date&quot;: &quot;1996-10-13T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 4,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4ac-718e-acee-f821f0af1ce3&quot;,
                &quot;name&quot;: &quot;Frami-Considine&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+et&quot;,
                &quot;first_color&quot;: &quot;#c56b5f&quot;,
                &quot;second_color&quot;: &quot;#186f39&quot;,
                &quot;year_of_foundation&quot;: 1987,
                &quot;stadium&quot;: &quot;Angelview Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b9-70de-91a6-53d6b8f1413b&quot;,
            &quot;first_name&quot;: &quot;Alexzander&quot;,
            &quot;last_name&quot;: &quot;Hickle&quot;,
            &quot;full_name&quot;: &quot;Alexzander Hickle&quot;,
            &quot;birth_date&quot;: &quot;1991-09-25T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 65,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4aa-7307-a54f-da091691880c&quot;,
                &quot;name&quot;: &quot;Carter-Mante&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bbaa?text=sports+odit&quot;,
                &quot;first_color&quot;: &quot;#489a1a&quot;,
                &quot;second_color&quot;: &quot;#f996bb&quot;,
                &quot;year_of_foundation&quot;: 1993,
                &quot;stadium&quot;: &quot;Elsieland Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4b9-70de-91a6-53d6b9ead844&quot;,
            &quot;first_name&quot;: &quot;Oswaldo&quot;,
            &quot;last_name&quot;: &quot;Buckridge&quot;,
            &quot;full_name&quot;: &quot;Oswaldo Buckridge&quot;,
            &quot;birth_date&quot;: &quot;1988-06-24T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 19,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4b0-708c-940e-1c44dd12b44a&quot;,
                &quot;name&quot;: &quot;Carroll and Sons&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cccc?text=sports+maiores&quot;,
                &quot;first_color&quot;: &quot;#878ee1&quot;,
                &quot;second_color&quot;: &quot;#59245a&quot;,
                &quot;year_of_foundation&quot;: 1969,
                &quot;stadium&quot;: &quot;East Mallieland Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ba-72ac-b0df-0c435b1c3469&quot;,
            &quot;first_name&quot;: &quot;Derick&quot;,
            &quot;last_name&quot;: &quot;Aufderhar&quot;,
            &quot;full_name&quot;: &quot;Derick Aufderhar&quot;,
            &quot;birth_date&quot;: &quot;1998-04-12T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 39,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4ac-718e-acee-f821efebc27a&quot;,
                &quot;name&quot;: &quot;Schmitt, Klocko and Bahringer&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00dddd?text=sports+aut&quot;,
                &quot;first_color&quot;: &quot;#8167e6&quot;,
                &quot;second_color&quot;: &quot;#571ad5&quot;,
                &quot;year_of_foundation&quot;: 1943,
                &quot;stadium&quot;: &quot;Ruperthaven Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4ba-72ac-b0df-0c435bf2f2c9&quot;,
            &quot;first_name&quot;: &quot;Brenden&quot;,
            &quot;last_name&quot;: &quot;Nitzsche&quot;,
            &quot;full_name&quot;: &quot;Brenden Nitzsche&quot;,
            &quot;birth_date&quot;: &quot;1994-05-14T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 9,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4a2-70a5-927e-7ff99e584630&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe, Kreiger and Kessler&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011ee?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#c2b05e&quot;,
                &quot;second_color&quot;: &quot;#09511f&quot;,
                &quot;year_of_foundation&quot;: 1995,
                &quot;stadium&quot;: &quot;Port Kirstin Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4bb-731b-b1c5-c622eec9c1dc&quot;,
            &quot;first_name&quot;: &quot;Johathan&quot;,
            &quot;last_name&quot;: &quot;Labadie&quot;,
            &quot;full_name&quot;: &quot;Johathan Labadie&quot;,
            &quot;birth_date&quot;: &quot;1996-06-13T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 36,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d493-72aa-8539-0bcbe15eed18&quot;,
                &quot;name&quot;: &quot;Schimmel, Block and D&#039;Amore&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00ddbb?text=sports+at&quot;,
                &quot;first_color&quot;: &quot;#01b921&quot;,
                &quot;second_color&quot;: &quot;#7d4047&quot;,
                &quot;year_of_foundation&quot;: 1900,
                &quot;stadium&quot;: &quot;East Arnaldofort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4bb-731b-b1c5-c622ef3e5205&quot;,
            &quot;first_name&quot;: &quot;Soledad&quot;,
            &quot;last_name&quot;: &quot;Prosacco&quot;,
            &quot;full_name&quot;: &quot;Soledad Prosacco&quot;,
            &quot;birth_date&quot;: &quot;1998-02-17T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 42,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4a2-70a5-927e-7ff99f2edea1&quot;,
                &quot;name&quot;: &quot;Adams LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0000ee?text=sports+enim&quot;,
                &quot;first_color&quot;: &quot;#3fadd0&quot;,
                &quot;second_color&quot;: &quot;#468642&quot;,
                &quot;year_of_foundation&quot;: 1997,
                &quot;stadium&quot;: &quot;Osbaldoberg Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4bc-70e4-b287-adc9db7fdaf2&quot;,
            &quot;first_name&quot;: &quot;Domenic&quot;,
            &quot;last_name&quot;: &quot;Leannon&quot;,
            &quot;full_name&quot;: &quot;Domenic Leannon&quot;,
            &quot;birth_date&quot;: &quot;2003-08-22T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 63,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4b1-71bb-aa1d-18713470a82f&quot;,
                &quot;name&quot;: &quot;Ondricka-Smitham&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+debitis&quot;,
                &quot;first_color&quot;: &quot;#d60f12&quot;,
                &quot;second_color&quot;: &quot;#b90cf3&quot;,
                &quot;year_of_foundation&quot;: 2011,
                &quot;stadium&quot;: &quot;West Randal Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4bd-72b6-aa4a-9ef7bfc56acb&quot;,
            &quot;first_name&quot;: &quot;Floy&quot;,
            &quot;last_name&quot;: &quot;Koepp&quot;,
            &quot;full_name&quot;: &quot;Floy Koepp&quot;,
            &quot;birth_date&quot;: &quot;2000-06-04T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 44,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d49d-704b-a924-77f012e9067f&quot;,
                &quot;name&quot;: &quot;Beahan, Mitchell and Adams&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004411?text=sports+aliquid&quot;,
                &quot;first_color&quot;: &quot;#77a692&quot;,
                &quot;second_color&quot;: &quot;#543a69&quot;,
                &quot;year_of_foundation&quot;: 1939,
                &quot;stadium&quot;: &quot;Stanton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4be-737a-aae0-db3b056e4b59&quot;,
            &quot;first_name&quot;: &quot;Kameron&quot;,
            &quot;last_name&quot;: &quot;Donnelly&quot;,
            &quot;full_name&quot;: &quot;Kameron Donnelly&quot;,
            &quot;birth_date&quot;: &quot;2000-06-17T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 2,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d471-7208-ab12-fba914dc0b26&quot;,
                &quot;name&quot;: &quot;Klein-Witting&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004466?text=sports+nisi&quot;,
                &quot;first_color&quot;: &quot;#2905d6&quot;,
                &quot;second_color&quot;: &quot;#adb7b7&quot;,
                &quot;year_of_foundation&quot;: 1954,
                &quot;stadium&quot;: &quot;South Brandybury Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4be-737a-aae0-db3b065bea4c&quot;,
            &quot;first_name&quot;: &quot;Vito&quot;,
            &quot;last_name&quot;: &quot;Kshlerin&quot;,
            &quot;full_name&quot;: &quot;Vito Kshlerin&quot;,
            &quot;birth_date&quot;: &quot;1988-04-14T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 44,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4a8-7284-9497-dd0ff2498daa&quot;,
                &quot;name&quot;: &quot;Auer-Raynor&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/001166?text=sports+unde&quot;,
                &quot;first_color&quot;: &quot;#dc4053&quot;,
                &quot;second_color&quot;: &quot;#cd4b42&quot;,
                &quot;year_of_foundation&quot;: 2016,
                &quot;stadium&quot;: &quot;Goyetteside Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4bf-7121-9c35-502fbd5c17b5&quot;,
            &quot;first_name&quot;: &quot;Willard&quot;,
            &quot;last_name&quot;: &quot;Anderson&quot;,
            &quot;full_name&quot;: &quot;Willard Anderson&quot;,
            &quot;birth_date&quot;: &quot;1996-07-27T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 80,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4a2-70a5-927e-7ff99e584630&quot;,
                &quot;name&quot;: &quot;O&#039;Keefe, Kreiger and Kessler&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011ee?text=sports+tempora&quot;,
                &quot;first_color&quot;: &quot;#c2b05e&quot;,
                &quot;second_color&quot;: &quot;#09511f&quot;,
                &quot;year_of_foundation&quot;: 1995,
                &quot;stadium&quot;: &quot;Port Kirstin Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4bf-7121-9c35-502fbe1da9fa&quot;,
            &quot;first_name&quot;: &quot;Timothy&quot;,
            &quot;last_name&quot;: &quot;Pfannerstill&quot;,
            &quot;full_name&quot;: &quot;Timothy Pfannerstill&quot;,
            &quot;birth_date&quot;: &quot;2001-11-10T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 25,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4ac-718e-acee-f821f09223ba&quot;,
                &quot;name&quot;: &quot;Marvin Ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/003388?text=sports+magni&quot;,
                &quot;first_color&quot;: &quot;#0ac0b9&quot;,
                &quot;second_color&quot;: &quot;#335ef6&quot;,
                &quot;year_of_foundation&quot;: 1924,
                &quot;stadium&quot;: &quot;Roweside Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c0-721b-8020-43d78184c25e&quot;,
            &quot;first_name&quot;: &quot;Diamond&quot;,
            &quot;last_name&quot;: &quot;Rosenbaum&quot;,
            &quot;full_name&quot;: &quot;Diamond Rosenbaum&quot;,
            &quot;birth_date&quot;: &quot;2005-11-23T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 88,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4b1-71bb-aa1d-18713470a82f&quot;,
                &quot;name&quot;: &quot;Ondricka-Smitham&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0011bb?text=sports+debitis&quot;,
                &quot;first_color&quot;: &quot;#d60f12&quot;,
                &quot;second_color&quot;: &quot;#b90cf3&quot;,
                &quot;year_of_foundation&quot;: 2011,
                &quot;stadium&quot;: &quot;West Randal Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c0-721b-8020-43d781f45cb4&quot;,
            &quot;first_name&quot;: &quot;Walter&quot;,
            &quot;last_name&quot;: &quot;DuBuque&quot;,
            &quot;full_name&quot;: &quot;Walter DuBuque&quot;,
            &quot;birth_date&quot;: &quot;1991-08-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 43,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4b0-708c-940e-1c44df73ed6c&quot;,
                &quot;name&quot;: &quot;Feest Ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0000aa?text=sports+tenetur&quot;,
                &quot;first_color&quot;: &quot;#7c0bab&quot;,
                &quot;second_color&quot;: &quot;#2420ab&quot;,
                &quot;year_of_foundation&quot;: 1979,
                &quot;stadium&quot;: &quot;Bartolettiport Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c1-7274-8029-7b9b746aa6ab&quot;,
            &quot;first_name&quot;: &quot;Columbus&quot;,
            &quot;last_name&quot;: &quot;DuBuque&quot;,
            &quot;full_name&quot;: &quot;Columbus DuBuque&quot;,
            &quot;birth_date&quot;: &quot;2005-01-31T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 30,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4a4-7359-8396-f5732979bbae&quot;,
                &quot;name&quot;: &quot;Daugherty Group&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/004488?text=sports+incidunt&quot;,
                &quot;first_color&quot;: &quot;#473d0b&quot;,
                &quot;second_color&quot;: &quot;#44418c&quot;,
                &quot;year_of_foundation&quot;: 1967,
                &quot;stadium&quot;: &quot;Gerlachville Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c1-7274-8029-7b9b74c2c7ee&quot;,
            &quot;first_name&quot;: &quot;Glennie&quot;,
            &quot;last_name&quot;: &quot;Weissnat&quot;,
            &quot;full_name&quot;: &quot;Glennie Weissnat&quot;,
            &quot;birth_date&quot;: &quot;2006-02-19T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 64,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d49d-704b-a924-77f012cea5b5&quot;,
                &quot;name&quot;: &quot;Hartmann, Balistreri and Crist&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+sint&quot;,
                &quot;first_color&quot;: &quot;#214642&quot;,
                &quot;second_color&quot;: &quot;#3e609e&quot;,
                &quot;year_of_foundation&quot;: 1952,
                &quot;stadium&quot;: &quot;Batzton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c2-72ca-a5a7-b35f6f92dcb4&quot;,
            &quot;first_name&quot;: &quot;Efrain&quot;,
            &quot;last_name&quot;: &quot;Emmerich&quot;,
            &quot;full_name&quot;: &quot;Efrain Emmerich&quot;,
            &quot;birth_date&quot;: &quot;2002-04-17T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 26,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d492-714d-9715-bd894ffb02d1&quot;,
                &quot;name&quot;: &quot;Blick LLC&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009966?text=sports+voluptas&quot;,
                &quot;first_color&quot;: &quot;#21f7a6&quot;,
                &quot;second_color&quot;: &quot;#22abdd&quot;,
                &quot;year_of_foundation&quot;: 1959,
                &quot;stadium&quot;: &quot;Daughertyhaven Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c2-72ca-a5a7-b35f6f9eb64d&quot;,
            &quot;first_name&quot;: &quot;Jerad&quot;,
            &quot;last_name&quot;: &quot;Stehr&quot;,
            &quot;full_name&quot;: &quot;Jerad Stehr&quot;,
            &quot;birth_date&quot;: &quot;2007-06-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Midfielder&quot;,
            &quot;number&quot;: 86,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4ad-71b7-bde2-e2e8055de486&quot;,
                &quot;name&quot;: &quot;Heller Ltd&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/009955?text=sports+ut&quot;,
                &quot;first_color&quot;: &quot;#86c549&quot;,
                &quot;second_color&quot;: &quot;#e46b73&quot;,
                &quot;year_of_foundation&quot;: 1999,
                &quot;stadium&quot;: &quot;New Jocelyn Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c3-719f-b4dc-b7af43372d7c&quot;,
            &quot;first_name&quot;: &quot;Deven&quot;,
            &quot;last_name&quot;: &quot;Gottlieb&quot;,
            &quot;full_name&quot;: &quot;Deven Gottlieb&quot;,
            &quot;birth_date&quot;: &quot;1998-12-16T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 60,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4b0-708c-940e-1c44decf67c8&quot;,
                &quot;name&quot;: &quot;Ryan, Metz and Sauer&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/0033ee?text=sports+ea&quot;,
                &quot;first_color&quot;: &quot;#c52ec5&quot;,
                &quot;second_color&quot;: &quot;#cbb027&quot;,
                &quot;year_of_foundation&quot;: 1913,
                &quot;stadium&quot;: &quot;Port Tamaraview Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c3-719f-b4dc-b7af43793a99&quot;,
            &quot;first_name&quot;: &quot;Price&quot;,
            &quot;last_name&quot;: &quot;Goldner&quot;,
            &quot;full_name&quot;: &quot;Price Goldner&quot;,
            &quot;birth_date&quot;: &quot;1989-03-05T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Forward&quot;,
            &quot;number&quot;: 85,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d47b-721f-8a04-2e2a5f9eb730&quot;,
                &quot;name&quot;: &quot;Marks-Klocko&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00aa44?text=sports+voluptatem&quot;,
                &quot;first_color&quot;: &quot;#e43395&quot;,
                &quot;second_color&quot;: &quot;#8331bb&quot;,
                &quot;year_of_foundation&quot;: 1956,
                &quot;stadium&quot;: &quot;North Rosemarie Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c4-7005-9348-37b9ce75bec2&quot;,
            &quot;first_name&quot;: &quot;Keegan&quot;,
            &quot;last_name&quot;: &quot;Hill&quot;,
            &quot;full_name&quot;: &quot;Keegan Hill&quot;,
            &quot;birth_date&quot;: &quot;1987-10-22T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 31,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d49b-7118-b930-594a3e7dcdc5&quot;,
                &quot;name&quot;: &quot;Schroeder-Green&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/008899?text=sports+reiciendis&quot;,
                &quot;first_color&quot;: &quot;#f61e4f&quot;,
                &quot;second_color&quot;: &quot;#2556b7&quot;,
                &quot;year_of_foundation&quot;: 1918,
                &quot;stadium&quot;: &quot;Lake Wilton Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c4-7005-9348-37b9cf53cf59&quot;,
            &quot;first_name&quot;: &quot;Daren&quot;,
            &quot;last_name&quot;: &quot;Goldner&quot;,
            &quot;full_name&quot;: &quot;Daren Goldner&quot;,
            &quot;birth_date&quot;: &quot;2004-12-20T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 50,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d49c-72f4-931a-ad3f243d444d&quot;,
                &quot;name&quot;: &quot;Hagenes-Farrell&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00cc11?text=sports+quidem&quot;,
                &quot;first_color&quot;: &quot;#4db86d&quot;,
                &quot;second_color&quot;: &quot;#80efd0&quot;,
                &quot;year_of_foundation&quot;: 1910,
                &quot;stadium&quot;: &quot;East Curt Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c5-7174-8a62-22d4d01bb091&quot;,
            &quot;first_name&quot;: &quot;Saige&quot;,
            &quot;last_name&quot;: &quot;McGlynn&quot;,
            &quot;full_name&quot;: &quot;Saige McGlynn&quot;,
            &quot;birth_date&quot;: &quot;1991-09-13T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 25,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d494-7157-8b6c-e48e7289f18f&quot;,
                &quot;name&quot;: &quot;Kris-Schmidt&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00eecc?text=sports+quos&quot;,
                &quot;first_color&quot;: &quot;#3b4a0e&quot;,
                &quot;second_color&quot;: &quot;#e5981e&quot;,
                &quot;year_of_foundation&quot;: 1946,
                &quot;stadium&quot;: &quot;Robynview Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c5-7174-8a62-22d4d0af9555&quot;,
            &quot;first_name&quot;: &quot;Oren&quot;,
            &quot;last_name&quot;: &quot;Bergstrom&quot;,
            &quot;full_name&quot;: &quot;Oren Bergstrom&quot;,
            &quot;birth_date&quot;: &quot;1993-08-08T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Defender&quot;,
            &quot;number&quot;: 30,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4a8-7284-9497-dd0ff2498daa&quot;,
                &quot;name&quot;: &quot;Auer-Raynor&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/001166?text=sports+unde&quot;,
                &quot;first_color&quot;: &quot;#dc4053&quot;,
                &quot;second_color&quot;: &quot;#cd4b42&quot;,
                &quot;year_of_foundation&quot;: 2016,
                &quot;stadium&quot;: &quot;Goyetteside Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: &quot;0197dc06-d4c6-72cd-9ae6-50e976c31b75&quot;,
            &quot;first_name&quot;: &quot;Kristopher&quot;,
            &quot;last_name&quot;: &quot;Adams&quot;,
            &quot;full_name&quot;: &quot;Kristopher Adams&quot;,
            &quot;birth_date&quot;: &quot;1998-08-17T00:00:00.000000Z&quot;,
            &quot;role&quot;: &quot;Goalkeeper&quot;,
            &quot;number&quot;: 17,
            &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
            &quot;team&quot;: {
                &quot;id&quot;: &quot;0197dc06-d4ab-7098-8c5c-703bc0992e87&quot;,
                &quot;name&quot;: &quot;Swaniawski-Torphy&quot;,
                &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb99?text=sports+sapiente&quot;,
                &quot;first_color&quot;: &quot;#a968f1&quot;,
                &quot;second_color&quot;: &quot;#0570bc&quot;,
                &quot;year_of_foundation&quot;: 1947,
                &quot;stadium&quot;: &quot;Nataliafort Stadium&quot;,
                &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-players" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-players"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-players"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-players" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-players">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-players" data-method="GET"
      data-path="api/players"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-players', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-players"
                    onclick="tryItOut('GETapi-players');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-players"
                    onclick="cancelTryOut('GETapi-players');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-players"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/players</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-players"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-players"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-players">POST api/players</h2>

<p>
</p>



<span id="example-requests-POSTapi-players">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://football-app.test/api/players" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"vmqeopfuudtdsufvyvddq\",
    \"last_name\": \"amniihfqcoynlazghdtqt\",
    \"birth_date\": \"2025-07-05T19:45:35\",
    \"role\": \"qxbajwbpilpmufinllwlo\",
    \"number\": 1,
    \"team_id\": \"0926ae27-427d-350e-aa2e-95b14501671d\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/players"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "vmqeopfuudtdsufvyvddq",
    "last_name": "amniihfqcoynlazghdtqt",
    "birth_date": "2025-07-05T19:45:35",
    "role": "qxbajwbpilpmufinllwlo",
    "number": 1,
    "team_id": "0926ae27-427d-350e-aa2e-95b14501671d"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-players">
</span>
<span id="execution-results-POSTapi-players" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-players"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-players"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-players" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-players">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-players" data-method="POST"
      data-path="api/players"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-players', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-players"
                    onclick="tryItOut('POSTapi-players');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-players"
                    onclick="cancelTryOut('POSTapi-players');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-players"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/players</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-players"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-players"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-players"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTapi-players"
               value="amniihfqcoynlazghdtqt"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>amniihfqcoynlazghdtqt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birth_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="birth_date"                data-endpoint="POSTapi-players"
               value="2025-07-05T19:45:35"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2025-07-05T19:45:35</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="POSTapi-players"
               value="qxbajwbpilpmufinllwlo"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>qxbajwbpilpmufinllwlo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>number</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="number"                data-endpoint="POSTapi-players"
               value="1"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 99. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="team_id"                data-endpoint="POSTapi-players"
               value="0926ae27-427d-350e-aa2e-95b14501671d"
               data-component="body">
    <br>
<p>Must be a valid UUID. The <code>id</code> of an existing record in the teams table. Example: <code>0926ae27-427d-350e-aa2e-95b14501671d</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-players--id-">GET api/players/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-players--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://football-app.test/api/players/0197dc06-d429-7363-8b05-6cc9d20b07bd" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/players/0197dc06-d429-7363-8b05-6cc9d20b07bd"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-players--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: &quot;0197dc06-d429-7363-8b05-6cc9d20b07bd&quot;,
    &quot;first_name&quot;: &quot;Saige&quot;,
    &quot;last_name&quot;: &quot;Hegmann&quot;,
    &quot;full_name&quot;: &quot;Saige Hegmann&quot;,
    &quot;birth_date&quot;: &quot;1994-10-24T00:00:00.000000Z&quot;,
    &quot;role&quot;: &quot;Goalkeeper&quot;,
    &quot;number&quot;: 10,
    &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
    &quot;team&quot;: {
        &quot;id&quot;: &quot;0197dc06-d427-721c-9da4-04d03851f463&quot;,
        &quot;name&quot;: &quot;Blick LLC&quot;,
        &quot;logo&quot;: &quot;https://via.placeholder.com/200x200.png/00bb00?text=sports+aut&quot;,
        &quot;first_color&quot;: &quot;#e3883f&quot;,
        &quot;second_color&quot;: &quot;#f32005&quot;,
        &quot;year_of_foundation&quot;: 1909,
        &quot;stadium&quot;: &quot;West Ahmedport Stadium&quot;,
        &quot;created_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-07-05T19:18:44.000000Z&quot;
    },
    &quot;scored_matches&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-players--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-players--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-players--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-players--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-players--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-players--id-" data-method="GET"
      data-path="api/players/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-players--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-players--id-"
                    onclick="tryItOut('GETapi-players--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-players--id-"
                    onclick="cancelTryOut('GETapi-players--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-players--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/players/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-players--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-players--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-players--id-"
               value="0197dc06-d429-7363-8b05-6cc9d20b07bd"
               data-component="url">
    <br>
<p>The ID of the player. Example: <code>0197dc06-d429-7363-8b05-6cc9d20b07bd</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-players--id-">PUT api/players/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-players--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://football-app.test/api/players/0197dc06-d429-7363-8b05-6cc9d20b07bd" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"vmqeopfuudtdsufvyvddq\",
    \"last_name\": \"amniihfqcoynlazghdtqt\",
    \"birth_date\": \"2025-07-05T19:45:35\",
    \"role\": \"qxbajwbpilpmufinllwlo\",
    \"number\": 1,
    \"team_id\": \"0926ae27-427d-350e-aa2e-95b14501671d\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/players/0197dc06-d429-7363-8b05-6cc9d20b07bd"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "vmqeopfuudtdsufvyvddq",
    "last_name": "amniihfqcoynlazghdtqt",
    "birth_date": "2025-07-05T19:45:35",
    "role": "qxbajwbpilpmufinllwlo",
    "number": 1,
    "team_id": "0926ae27-427d-350e-aa2e-95b14501671d"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-players--id-">
</span>
<span id="execution-results-PUTapi-players--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-players--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-players--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-players--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-players--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-players--id-" data-method="PUT"
      data-path="api/players/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-players--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-players--id-"
                    onclick="tryItOut('PUTapi-players--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-players--id-"
                    onclick="cancelTryOut('PUTapi-players--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-players--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/players/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/players/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-players--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-players--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-players--id-"
               value="0197dc06-d429-7363-8b05-6cc9d20b07bd"
               data-component="url">
    <br>
<p>The ID of the player. Example: <code>0197dc06-d429-7363-8b05-6cc9d20b07bd</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="PUTapi-players--id-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="PUTapi-players--id-"
               value="amniihfqcoynlazghdtqt"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>amniihfqcoynlazghdtqt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>birth_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="birth_date"                data-endpoint="PUTapi-players--id-"
               value="2025-07-05T19:45:35"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2025-07-05T19:45:35</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="PUTapi-players--id-"
               value="qxbajwbpilpmufinllwlo"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>qxbajwbpilpmufinllwlo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>number</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="number"                data-endpoint="PUTapi-players--id-"
               value="1"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 99. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="team_id"                data-endpoint="PUTapi-players--id-"
               value="0926ae27-427d-350e-aa2e-95b14501671d"
               data-component="body">
    <br>
<p>Must be a valid UUID. The <code>id</code> of an existing record in the teams table. Example: <code>0926ae27-427d-350e-aa2e-95b14501671d</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-players--id-">DELETE api/players/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-players--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://football-app.test/api/players/0197dc06-d429-7363-8b05-6cc9d20b07bd" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/players/0197dc06-d429-7363-8b05-6cc9d20b07bd"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-players--id-">
</span>
<span id="execution-results-DELETEapi-players--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-players--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-players--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-players--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-players--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-players--id-" data-method="DELETE"
      data-path="api/players/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-players--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-players--id-"
                    onclick="tryItOut('DELETEapi-players--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-players--id-"
                    onclick="cancelTryOut('DELETEapi-players--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-players--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/players/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-players--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-players--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-players--id-"
               value="0197dc06-d429-7363-8b05-6cc9d20b07bd"
               data-component="url">
    <br>
<p>The ID of the player. Example: <code>0197dc06-d429-7363-8b05-6cc9d20b07bd</code></p>
            </div>
                    </form>

                <h1 id="football-match-management">Football Match Management</h1>

    <p>APIs for managing football matches</p>

                                <h2 id="football-match-management-GETapi-competitions--competition_id--matches">Get matches by competition</h2>

<p>
</p>

<p>Returns all football matches for a specific competition.</p>

<span id="example-requests-GETapi-competitions--competition_id--matches">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://football-app.test/api/competitions/0197dc06-d48f-72b8-94f9-ac4426e2e81c/matches" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/competitions/0197dc06-d48f-72b8-94f9-ac4426e2e81c/matches"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-competitions--competition_id--matches">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;0197dc1f-6742-72ba-a0ed-b571df1b58ac&quot;,
        &quot;date&quot;: &quot;2025-02-06T18:12:02.000000Z&quot;,
        &quot;goal_home&quot;: 0,
        &quot;goal_away&quot;: 4,
        &quot;created_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;data&quot;: [{&quot;id&quot;: &quot;123e4567-e89b-12d3-a456-426614174000&quot;, &quot;date&quot;: &quot;2023-10-15&quot;, &quot;goal_home&quot;: 2, &quot;goal_away&quot;: 1, &quot;created_at&quot;: &quot;2023-10-16T10:00:00.000000Z&quot;, &quot;updated_at&quot;: &quot;2023-10-16T10:00:00.000000Z&quot;, &quot;competition&quot;: {...}, &quot;home_team&quot;: {...}, &quot;away_team&quot;: {...}}]}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-competitions--competition_id--matches" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-competitions--competition_id--matches"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-competitions--competition_id--matches"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-competitions--competition_id--matches" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-competitions--competition_id--matches">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-competitions--competition_id--matches" data-method="GET"
      data-path="api/competitions/{competition_id}/matches"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-competitions--competition_id--matches', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-competitions--competition_id--matches"
                    onclick="tryItOut('GETapi-competitions--competition_id--matches');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-competitions--competition_id--matches"
                    onclick="cancelTryOut('GETapi-competitions--competition_id--matches');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-competitions--competition_id--matches"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/competitions/{competition_id}/matches</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-competitions--competition_id--matches"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-competitions--competition_id--matches"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>competition_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="competition_id"                data-endpoint="GETapi-competitions--competition_id--matches"
               value="0197dc06-d48f-72b8-94f9-ac4426e2e81c"
               data-component="url">
    <br>
<p>The ID of the competition. Example: <code>0197dc06-d48f-72b8-94f9-ac4426e2e81c</code></p>
            </div>
                    </form>

                    <h2 id="football-match-management-GETapi-teams--team_id--matches">Get matches by team</h2>

<p>
</p>

<p>Returns all football matches where the specified team played (either as home or away team).</p>

<span id="example-requests-GETapi-teams--team_id--matches">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://football-app.test/api/teams/0197dc06-d427-721c-9da4-04d03851f463/matches" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/teams/0197dc06-d427-721c-9da4-04d03851f463/matches"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-teams--team_id--matches">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;0197dc1f-677c-7040-bd71-19195fd8e2ca&quot;,
        &quot;date&quot;: &quot;2025-04-08T02:43:49.000000Z&quot;,
        &quot;goal_home&quot;: 3,
        &quot;goal_away&quot;: 2,
        &quot;created_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;data&quot;: [{&quot;id&quot;: &quot;123e4567-e89b-12d3-a456-426614174000&quot;, &quot;date&quot;: &quot;2023-10-15&quot;, &quot;goal_home&quot;: 2, &quot;goal_away&quot;: 1, &quot;created_at&quot;: &quot;2023-10-16T10:00:00.000000Z&quot;, &quot;updated_at&quot;: &quot;2023-10-16T10:00:00.000000Z&quot;, &quot;competition&quot;: {...}, &quot;home_team&quot;: {...}, &quot;away_team&quot;: {...}}]}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-teams--team_id--matches" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-teams--team_id--matches"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teams--team_id--matches"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-teams--team_id--matches" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-teams--team_id--matches">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-teams--team_id--matches" data-method="GET"
      data-path="api/teams/{team_id}/matches"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-teams--team_id--matches', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-teams--team_id--matches"
                    onclick="tryItOut('GETapi-teams--team_id--matches');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-teams--team_id--matches"
                    onclick="cancelTryOut('GETapi-teams--team_id--matches');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-teams--team_id--matches"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/teams/{team_id}/matches</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-teams--team_id--matches"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-teams--team_id--matches"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="team_id"                data-endpoint="GETapi-teams--team_id--matches"
               value="0197dc06-d427-721c-9da4-04d03851f463"
               data-component="url">
    <br>
<p>The ID of the team. Example: <code>0197dc06-d427-721c-9da4-04d03851f463</code></p>
            </div>
                    </form>

                    <h2 id="football-match-management-GETapi-matches">Get all football matches</h2>

<p>
</p>

<p>Returns a list of all football matches with related competition and teams.</p>

<span id="example-requests-GETapi-matches">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://football-app.test/api/matches" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/matches"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-matches">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;0197dc1f-67b7-72e2-851f-08205c451de8&quot;,
        &quot;date&quot;: &quot;2025-06-04T03:02:22.000000Z&quot;,
        &quot;goal_home&quot;: 0,
        &quot;goal_away&quot;: 2,
        &quot;created_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-matches" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-matches"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-matches"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-matches" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-matches">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-matches" data-method="GET"
      data-path="api/matches"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-matches', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-matches"
                    onclick="tryItOut('GETapi-matches');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-matches"
                    onclick="cancelTryOut('GETapi-matches');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-matches"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/matches</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-matches"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-matches"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="football-match-management-POSTapi-matches">Create a new football match</h2>

<p>
</p>

<p>Creates a new football match with the specified parameters. Teams must belong to the competition.</p>

<span id="example-requests-POSTapi-matches">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://football-app.test/api/matches" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"competition_id\": \"66529e01-d113-3473-8d6f-9e11e09332ea\",
    \"home_team_id\": \"fa010f60-df29-3f05-8bc7-bed48f550d13\",
    \"away_team_id\": \"57357f37-0ea3-38e5-8a6c-9de9d06e75fd\",
    \"goal_home\": 19,
    \"goal_away\": 70,
    \"date\": \"2025-07-05T19:45:35\",
    \"scorers\": [
        {
            \"player_id\": \"6b3f9e86-0446-3cb5-892f-368abc97f2e1\",
            \"minute\": 19
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/matches"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "competition_id": "66529e01-d113-3473-8d6f-9e11e09332ea",
    "home_team_id": "fa010f60-df29-3f05-8bc7-bed48f550d13",
    "away_team_id": "57357f37-0ea3-38e5-8a6c-9de9d06e75fd",
    "goal_home": 19,
    "goal_away": 70,
    "date": "2025-07-05T19:45:35",
    "scorers": [
        {
            "player_id": "6b3f9e86-0446-3cb5-892f-368abc97f2e1",
            "minute": 19
        }
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-matches">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;0197dc1f-67c0-711e-8ae9-0c9a4b89be60&quot;,
        &quot;date&quot;: &quot;2025-06-23T23:40:42.000000Z&quot;,
        &quot;goal_home&quot;: 0,
        &quot;goal_away&quot;: 4,
        &quot;created_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;errors&quot;: {&quot;competition_id&quot;: [&quot;The competition id field is required.&quot;], &quot;home_team_id&quot;: [&quot;The home team id field is required.&quot;], &quot;away_team_id&quot;: [&quot;The away team id field is required.&quot;], &quot;goal_home&quot;: [&quot;The goal home field is required.&quot;], &quot;goal_away&quot;: [&quot;The goal away field is required.&quot;], &quot;date&quot;: [&quot;The date field is required.&quot;]}}}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-matches" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-matches"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-matches"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-matches" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-matches">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-matches" data-method="POST"
      data-path="api/matches"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-matches', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-matches"
                    onclick="tryItOut('POSTapi-matches');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-matches"
                    onclick="cancelTryOut('POSTapi-matches');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-matches"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/matches</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-matches"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-matches"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>competition_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="competition_id"                data-endpoint="POSTapi-matches"
               value="66529e01-d113-3473-8d6f-9e11e09332ea"
               data-component="body">
    <br>
<p>Must be a valid UUID. The <code>id</code> of an existing record in the competitions table. Example: <code>66529e01-d113-3473-8d6f-9e11e09332ea</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>home_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="home_team_id"                data-endpoint="POSTapi-matches"
               value="fa010f60-df29-3f05-8bc7-bed48f550d13"
               data-component="body">
    <br>
<p>Must be a valid UUID. The <code>id</code> of an existing record in the teams table. Example: <code>fa010f60-df29-3f05-8bc7-bed48f550d13</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>away_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="away_team_id"                data-endpoint="POSTapi-matches"
               value="57357f37-0ea3-38e5-8a6c-9de9d06e75fd"
               data-component="body">
    <br>
<p>The value and <code>home_team_id</code> must be different. Must be a valid UUID. The <code>id</code> of an existing record in the teams table. Example: <code>57357f37-0ea3-38e5-8a6c-9de9d06e75fd</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>goal_home</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="goal_home"                data-endpoint="POSTapi-matches"
               value="19"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>19</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>goal_away</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="goal_away"                data-endpoint="POSTapi-matches"
               value="70"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>70</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="POSTapi-matches"
               value="2025-07-05T19:45:35"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2025-07-05T19:45:35</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>scorers</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
<i>optional</i> &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>player_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="scorers.0.player_id"                data-endpoint="POSTapi-matches"
               value="6b3f9e86-0446-3cb5-892f-368abc97f2e1"
               data-component="body">
    <br>
<p>This field is required when <code>scorers</code> is present. Must be a valid UUID. The <code>id</code> of an existing record in the players table. Example: <code>6b3f9e86-0446-3cb5-892f-368abc97f2e1</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>minute</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="scorers.0.minute"                data-endpoint="POSTapi-matches"
               value="19"
               data-component="body">
    <br>
<p>This field is required when <code>scorers.*.player_id</code> is present. Must be at least 1. Must not be greater than 120. Example: <code>19</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="football-match-management-GETapi-matches--id-">Get a specific football match</h2>

<p>
</p>

<p>Returns the details of a specific football match including related competition, teams and scorers.</p>

<span id="example-requests-GETapi-matches--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://football-app.test/api/matches/0197dc06-d4cb-7181-966b-c35eec4ddc50" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/matches/0197dc06-d4cb-7181-966b-c35eec4ddc50"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-matches--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;0197dc1f-67c7-7056-8e36-f29aabef7ed9&quot;,
        &quot;date&quot;: &quot;2025-05-04T18:54:39.000000Z&quot;,
        &quot;goal_home&quot;: 5,
        &quot;goal_away&quot;: 4,
        &quot;created_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;data&quot;: {&quot;id&quot;: &quot;123e4567-e89b-12d3-a456-426614174000&quot;, &quot;date&quot;: &quot;2023-10-15&quot;, &quot;goal_home&quot;: 2, &quot;goal_away&quot;: 1, &quot;created_at&quot;: &quot;2023-10-16T10:00:00.000000Z&quot;, &quot;updated_at&quot;: &quot;2023-10-16T10:00:00.000000Z&quot;, &quot;competition&quot;: {...}, &quot;home_team&quot;: {...}, &quot;away_team&quot;: {...}, &quot;scorers&quot;: [{...}], &quot;scorers_with_minutes&quot;: [{...}]}}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-matches--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-matches--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-matches--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-matches--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-matches--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-matches--id-" data-method="GET"
      data-path="api/matches/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-matches--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-matches--id-"
                    onclick="tryItOut('GETapi-matches--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-matches--id-"
                    onclick="cancelTryOut('GETapi-matches--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-matches--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/matches/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-matches--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-matches--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-matches--id-"
               value="0197dc06-d4cb-7181-966b-c35eec4ddc50"
               data-component="url">
    <br>
<p>The ID of the match. Example: <code>0197dc06-d4cb-7181-966b-c35eec4ddc50</code></p>
            </div>
                    </form>

                    <h2 id="football-match-management-PUTapi-matches--id-">Update a football match</h2>

<p>
</p>

<p>Updates an existing football match with the provided data.</p>

<span id="example-requests-PUTapi-matches--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://football-app.test/api/matches/0197dc06-d4cb-7181-966b-c35eec4ddc50" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"competition_id\": \"66529e01-d113-3473-8d6f-9e11e09332ea\",
    \"home_team_id\": \"fa010f60-df29-3f05-8bc7-bed48f550d13\",
    \"away_team_id\": \"57357f37-0ea3-38e5-8a6c-9de9d06e75fd\",
    \"goal_home\": 19,
    \"goal_away\": 70,
    \"date\": \"2025-07-05T19:45:35\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/matches/0197dc06-d4cb-7181-966b-c35eec4ddc50"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "competition_id": "66529e01-d113-3473-8d6f-9e11e09332ea",
    "home_team_id": "fa010f60-df29-3f05-8bc7-bed48f550d13",
    "away_team_id": "57357f37-0ea3-38e5-8a6c-9de9d06e75fd",
    "goal_home": 19,
    "goal_away": 70,
    "date": "2025-07-05T19:45:35"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-matches--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;0197dc1f-67cd-710f-bafa-a084db89bc61&quot;,
        &quot;date&quot;: &quot;2025-06-09T23:47:00.000000Z&quot;,
        &quot;goal_home&quot;: 4,
        &quot;goal_away&quot;: 0,
        &quot;created_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;errors&quot;: {...}}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-matches--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-matches--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-matches--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-matches--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-matches--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-matches--id-" data-method="PUT"
      data-path="api/matches/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-matches--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-matches--id-"
                    onclick="tryItOut('PUTapi-matches--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-matches--id-"
                    onclick="cancelTryOut('PUTapi-matches--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-matches--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/matches/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/matches/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-matches--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-matches--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-matches--id-"
               value="0197dc06-d4cb-7181-966b-c35eec4ddc50"
               data-component="url">
    <br>
<p>The ID of the match. Example: <code>0197dc06-d4cb-7181-966b-c35eec4ddc50</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>competition_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="competition_id"                data-endpoint="PUTapi-matches--id-"
               value="66529e01-d113-3473-8d6f-9e11e09332ea"
               data-component="body">
    <br>
<p>Must be a valid UUID. The <code>id</code> of an existing record in the competitions table. Example: <code>66529e01-d113-3473-8d6f-9e11e09332ea</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>home_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="home_team_id"                data-endpoint="PUTapi-matches--id-"
               value="fa010f60-df29-3f05-8bc7-bed48f550d13"
               data-component="body">
    <br>
<p>Must be a valid UUID. The <code>id</code> of an existing record in the teams table. Example: <code>fa010f60-df29-3f05-8bc7-bed48f550d13</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>away_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="away_team_id"                data-endpoint="PUTapi-matches--id-"
               value="57357f37-0ea3-38e5-8a6c-9de9d06e75fd"
               data-component="body">
    <br>
<p>The value and <code>home_team_id</code> must be different. Must be a valid UUID. The <code>id</code> of an existing record in the teams table. Example: <code>57357f37-0ea3-38e5-8a6c-9de9d06e75fd</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>goal_home</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="goal_home"                data-endpoint="PUTapi-matches--id-"
               value="19"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>19</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>goal_away</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="goal_away"                data-endpoint="PUTapi-matches--id-"
               value="70"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>70</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="PUTapi-matches--id-"
               value="2025-07-05T19:45:35"
               data-component="body">
    <br>
<p>Must be a valid date. Example: <code>2025-07-05T19:45:35</code></p>
        </div>
        </form>

                    <h2 id="football-match-management-DELETEapi-matches--id-">Delete a football match</h2>

<p>
</p>

<p>Deletes a specific football match from the database.</p>

<span id="example-requests-DELETEapi-matches--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://football-app.test/api/matches/0197dc06-d4cb-7181-966b-c35eec4ddc50" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/matches/0197dc06-d4cb-7181-966b-c35eec4ddc50"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-matches--id-">
</span>
<span id="execution-results-DELETEapi-matches--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-matches--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-matches--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-matches--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-matches--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-matches--id-" data-method="DELETE"
      data-path="api/matches/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-matches--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-matches--id-"
                    onclick="tryItOut('DELETEapi-matches--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-matches--id-"
                    onclick="cancelTryOut('DELETEapi-matches--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-matches--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/matches/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-matches--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-matches--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-matches--id-"
               value="0197dc06-d4cb-7181-966b-c35eec4ddc50"
               data-component="url">
    <br>
<p>The ID of the match. Example: <code>0197dc06-d4cb-7181-966b-c35eec4ddc50</code></p>
            </div>
                    </form>

                    <h2 id="football-match-management-POSTapi-matches--footballMatch_id--scorers">Add a scorer to a match</h2>

<p>
</p>

<p>Adds a player as a goal scorer to a football match at a specific minute.</p>

<span id="example-requests-POSTapi-matches--footballMatch_id--scorers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://football-app.test/api/matches/0197dc06-d4cb-7181-966b-c35eec4ddc50/scorers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"player_id\": \"66529e01-d113-3473-8d6f-9e11e09332ea\",
    \"minute\": 16
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/matches/0197dc06-d4cb-7181-966b-c35eec4ddc50/scorers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "player_id": "66529e01-d113-3473-8d6f-9e11e09332ea",
    "minute": 16
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-matches--footballMatch_id--scorers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;0197dc1f-67d5-7216-b45f-b6ff0ea1072b&quot;,
        &quot;date&quot;: &quot;2025-05-15T14:11:06.000000Z&quot;,
        &quot;goal_home&quot;: 1,
        &quot;goal_away&quot;: 3,
        &quot;created_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation error):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;errors&quot;: {
        &quot;player_id&quot;: [
            &quot;The player id field is required.&quot;
        ],
        &quot;minute&quot;: [
            &quot;The minute field is required.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-matches--footballMatch_id--scorers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-matches--footballMatch_id--scorers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-matches--footballMatch_id--scorers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-matches--footballMatch_id--scorers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-matches--footballMatch_id--scorers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-matches--footballMatch_id--scorers" data-method="POST"
      data-path="api/matches/{footballMatch_id}/scorers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-matches--footballMatch_id--scorers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-matches--footballMatch_id--scorers"
                    onclick="tryItOut('POSTapi-matches--footballMatch_id--scorers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-matches--footballMatch_id--scorers"
                    onclick="cancelTryOut('POSTapi-matches--footballMatch_id--scorers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-matches--footballMatch_id--scorers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/matches/{footballMatch_id}/scorers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-matches--footballMatch_id--scorers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-matches--footballMatch_id--scorers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>footballMatch_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="footballMatch_id"                data-endpoint="POSTapi-matches--footballMatch_id--scorers"
               value="0197dc06-d4cb-7181-966b-c35eec4ddc50"
               data-component="url">
    <br>
<p>The ID of the footballMatch. Example: <code>0197dc06-d4cb-7181-966b-c35eec4ddc50</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>player_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="player_id"                data-endpoint="POSTapi-matches--footballMatch_id--scorers"
               value="66529e01-d113-3473-8d6f-9e11e09332ea"
               data-component="body">
    <br>
<p>Must be a valid UUID. The <code>id</code> of an existing record in the players table. Example: <code>66529e01-d113-3473-8d6f-9e11e09332ea</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>minute</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="minute"                data-endpoint="POSTapi-matches--footballMatch_id--scorers"
               value="16"
               data-component="body">
    <br>
<p>Must be at least 1. Must not be greater than 120. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="football-match-management-DELETEapi-matches--footballMatch_id--scorers--player_id-">Remove a scorer from a match</h2>

<p>
</p>

<p>Removes a player from the list of goal scorers for a football match.</p>

<span id="example-requests-DELETEapi-matches--footballMatch_id--scorers--player_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://football-app.test/api/matches/0197dc06-d4cb-7181-966b-c35eec4ddc50/scorers/0197dc06-d429-7363-8b05-6cc9d20b07bd" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://football-app.test/api/matches/0197dc06-d4cb-7181-966b-c35eec4ddc50/scorers/0197dc06-d429-7363-8b05-6cc9d20b07bd"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-matches--footballMatch_id--scorers--player_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: &quot;0197dc1f-67dd-734d-aa80-43914cfd9ad4&quot;,
        &quot;date&quot;: &quot;2025-04-08T13:13:02.000000Z&quot;,
        &quot;goal_home&quot;: 1,
        &quot;goal_away&quot;: 3,
        &quot;created_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-07-05T19:45:35.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-matches--footballMatch_id--scorers--player_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-matches--footballMatch_id--scorers--player_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-matches--footballMatch_id--scorers--player_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-matches--footballMatch_id--scorers--player_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-matches--footballMatch_id--scorers--player_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-matches--footballMatch_id--scorers--player_id-" data-method="DELETE"
      data-path="api/matches/{footballMatch_id}/scorers/{player_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-matches--footballMatch_id--scorers--player_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-matches--footballMatch_id--scorers--player_id-"
                    onclick="tryItOut('DELETEapi-matches--footballMatch_id--scorers--player_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-matches--footballMatch_id--scorers--player_id-"
                    onclick="cancelTryOut('DELETEapi-matches--footballMatch_id--scorers--player_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-matches--footballMatch_id--scorers--player_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/matches/{footballMatch_id}/scorers/{player_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-matches--footballMatch_id--scorers--player_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-matches--footballMatch_id--scorers--player_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>footballMatch_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="footballMatch_id"                data-endpoint="DELETEapi-matches--footballMatch_id--scorers--player_id-"
               value="0197dc06-d4cb-7181-966b-c35eec4ddc50"
               data-component="url">
    <br>
<p>The ID of the footballMatch. Example: <code>0197dc06-d4cb-7181-966b-c35eec4ddc50</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>player_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="player_id"                data-endpoint="DELETEapi-matches--footballMatch_id--scorers--player_id-"
               value="0197dc06-d429-7363-8b05-6cc9d20b07bd"
               data-component="url">
    <br>
<p>The ID of the player. Example: <code>0197dc06-d429-7363-8b05-6cc9d20b07bd</code></p>
            </div>
                    </form>




    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
