@extends('theme')
@section('title')
    Article Name | Web Development Blog
@endsection

@section('article')

    <div class="container mt-10">
        <div class="mb-8">
            <img class="shadow-lg rounded-xl min-w-full max-h-80 border-none"
                 src="{{ asset("vue3autocomplate.png") }}" alt="vue 3 resmi">
        </div>
        <div class="text-center mb-8 ">
            <h1 class="font-bold text-2xl">How to build an autocomplete field with Vue 3</h1>
            <h2 class="text-center text-xl mt-2 font-bold mb-5">Create an autocomplete/auto-suggest search field with
                Vue 3 and the Composition API without using any external packages</h2>
            <p class="text-sm text-center">November 2021</p>

        </div>
        <div class="prose prose-indigo lg:prose-xl max-w-none">
            <!-- Data goes here -->
            <div>
                <ul>
                    <li><a href="#intro">Intro</a></li>
                    <li><a href="#creating-the-text-input">Creating the text input</a></li>
                    <li><a href="#getting-the-search-term">Getting the search term</a></li>
                    <li><a href="#searching-the-data">Searching the data</a></li>
                    <li><a href="#showing-the-results">Showing the results</a></li>
                    <li><a href="#selecting-a-result">Selecting a result</a></li>
                    <li><a href="#result">Result</a></li>
                </ul>
                <h2 id="intro" style="position:relative;"><a href="#intro" aria-label="intro permalink"
                                                             class="anchor before">
                        <svg aria-hidden="true" focusable="false" height="16" version="1.1" viewBox="0 0 16 16"
                             width="16">
                            <path fill-rule="evenodd"
                                  d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                        </svg>
                    </a>Intro
                </h2>
                <p>Although <a href="https://v3.vuejs.org" target="_blank" rel="nofollow noopener noreferrer">Vue 3</a>
                    was released almost a year ago many packages have not been updated to be
                    compatible.</p>
                <p>I typically reach for <a href="https://github.com/kraaden/autocomplete" target="_blank"
                                            rel="nofollow noopener noreferrer">Kraaden Autocomplete</a>
                    or <a href="https://tarekraafat.github.io/autoComplete.js" target="_blank"
                          rel="nofollow noopener noreferrer">autoComplete.js</a> which can be hooked into the Vue
                    lifecycle methods
                    and work great, however sometimes more flexibility is required, and I prefer using Vue specific
                    packages where possible.</p>
                <p>This approach uses Vue 3 with the
                    built-in <a href="https://v3.vuejs.org/guide/composition-api-introduction.html" target="_blank"
                                rel="nofollow noopener noreferrer">Composition API</a>, doesn't use an external JS
                    library and can be modified to suit most needs.</p>
                <p><a href="https://tailwindcss.com" target="_blank" rel="nofollow noopener noreferrer">Tailwind CSS</a>
                    is used for basic styling which I will not be covering, and I have removed
                    styling from the code snippets to keep the article concise. <a href="https://vitejs.dev"
                                                                                   target="_blank"
                                                                                   rel="nofollow noopener noreferrer">Vite</a>
                    is used for local
                    development (none of these are required). A repo can be found at the bottom of the article.</p>
                <h2 id="creating-the-text-input" style="position:relative;"><a href="#creating-the-text-input"
                                                                               aria-label="creating the text input permalink"
                                                                               class="anchor before">
                        <svg aria-hidden="true" focusable="false" height="16" version="1.1" viewBox="0 0 16 16"
                             width="16">
                            <path fill-rule="evenodd"
                                  d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                        </svg>
                    </a>Creating the text input
                </h2>
                <p>To start we will need to create a standard label and text input.</p>
                <div class="gatsby-highlight" data-language="javascript"><pre class="language-javascript"><code
                            class="language-javascript"><span class="token operator">&lt;</span>label <span
                                class="token keyword">for</span><span class="token operator">=</span><span
                                class="token string">"search"</span><span class="token operator">&gt;</span>
  Type the name <span class="token keyword">of</span> a country to search
<span class="token operator">&lt;</span><span class="token operator">/</span>label<span
                                class="token operator">&gt;</span>

<span class="token operator">&lt;</span>input type<span class="token operator">=</span><span
                                class="token string">"text"</span> id<span class="token operator">=</span><span
                                class="token string">"search"</span> placeholder<span
                                class="token operator">=</span><span class="token string">"Type here..."</span><span
                                class="token operator">&gt;</span></code></pre>
                </div>
                <p>You will have something like this:</p>
                <p><span class="gatsby-resp-image-wrapper"
                         style="position: relative; display: block; margin-left: auto; margin-right: auto; max-width: 339px; ">
      <a class="gatsby-resp-image-link"
         href="{{ asset("input.png") }}"
         style="display: block" target="_blank" rel="noopener">
    <span class="gatsby-resp-image-background-image"
          style="padding-bottom: 30.2222%; position: relative; bottom: 0px; left: 0px; background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAGCAYAAADDl76dAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA2UlEQVQY05VQa4+CMBDk//80Tw2Ix2mMGo0GEMrDF6XtdnSXmEv8pE2mO53tTjoNVN3gmOY4FQqHY4airJBmJ+SFQpYXKFUNVTXCWec+zzDnuapuYayD7o0gqJsWP5MI82SJKE6QLFaYhnPEvwvh681OeuEsQRT/Ddp2j9E4xHg6k0dYR2LWG4uAN/Ie74s1Ig/nCI5oOHsIZ41HGP9mBp02g+G902jaMy7XG9rzBbd7B+/9x3gticyGuu+R5qWY8Z9wJSK59I2pGL6ycxRrnUTgyhG+hX5GfgDclM5LcjQ27QAAAABJRU5ErkJggg==&quot;); background-size: cover; display: block; transition: opacity 0.5s ease 0.5s; opacity: 0;"></span>
  <img class="gatsby-resp-image-image" alt="Created label and input" title="Created label and input"
       src="{{ asset("input.png") }}" srcset="{{ asset("input.png") }} 225w,
{{ asset("input.png") }} 339w"
       sizes="(max-width: 339px) 100vw, 339px"
       style="width: 100%; height: 100%; margin: 0px; vertical-align: middle; position: absolute; top: 0px; left: 0px; opacity: 1; transition: opacity 0.5s ease 0s; color: inherit; box-shadow: white 0px 0px 0px 400px inset;"
       loading="lazy" decoding="async">
  </a>
    </span></p>
                <h2 id="getting-the-search-term" style="position:relative;"><a href="#getting-the-search-term"
                                                                               aria-label="getting the search term permalink"
                                                                               class="anchor before">
                        <svg aria-hidden="true" focusable="false" height="16" version="1.1" viewBox="0 0 16 16"
                             width="16">
                            <path fill-rule="evenodd"
                                  d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                        </svg>
                    </a>Getting the search term
                </h2>
                <p>At the moment the input doesn't do anything. To move on we will need to get the value of the input
                    when the user types
                    something into it. Add this to the bottom of your Vue file:</p>
                <div class="gatsby-highlight" data-language="javascript"><pre class="language-javascript"><code
                            class="language-javascript"><span class="token operator">&lt;</span>script<span
                                class="token operator">&gt;</span>
<span class="token keyword">import</span> <span class="token punctuation">{</span>ref<span
                                class="token punctuation">}</span> <span class="token keyword">from</span> <span
                                class="token string">'vue'</span>

<span class="token keyword">export</span> <span class="token keyword">default</span> <span
                                class="token punctuation">{</span>
  <span class="token function">setup</span><span class="token punctuation">(</span><span
                                class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token keyword">let</span> searchTerm <span class="token operator">=</span> <span
                                class="token function">ref</span><span class="token punctuation">(</span><span
                                class="token string">''</span><span class="token punctuation">)</span>

    <span class="token keyword">return</span> <span class="token punctuation">{</span>
      searchTerm
    <span class="token punctuation">}</span>
  <span class="token punctuation">}</span>
<span class="token punctuation">}</span>
<span class="token operator">&lt;</span><span class="token operator">/</span>script<span
                                class="token operator">&gt;</span></code></pre>
                </div>
                <p>The <a href="https://v3.vuejs.org/guide/composition-api-introduction.html#setup-component-option"
                          target="_blank" rel="nofollow noopener noreferrer">setup</a> component option is new
                    in Vue 3. Many functions and options can be set in here, rather than being spread throughout the
                    file with the
                    old <a href="https://v3.vuejs.org/api/options-api.html" target="_blank"
                           rel="nofollow noopener noreferrer">Options API</a>.</p>
                <p><a href="https://v3.vuejs.org/guide/composition-api-introduction.html#reactive-variables-with-ref"
                      target="_blank" rel="nofollow noopener noreferrer">ref</a> is a new function
                    in Vue 3 used to make a variable reactive. To get or set a variable you will need to access the
                    'value' property of
                    it.</p>
                <p>What we have done above is initialised a reactive 'searchTerm' variable to an empty string, and
                    returned it which will
                    make it available in the template itself.</p>
                <p>Now that we have prepared the script to accept the user's input, we now need to provide/bind it to
                    the variable
                    using <a href="https://v3.vuejs.org/guide/introduction.html#handling-user-input" target="_blank"
                             rel="nofollow noopener noreferrer">v-model</a>:</p>
                <div class="gatsby-highlight" data-language="javascript"><pre class="language-javascript"><code
                            class="language-javascript"><span class="token operator">&lt;</span>input
  type<span class="token operator">=</span><span class="token string">"text"</span>
  id<span class="token operator">=</span><span class="token string">"search"</span>
  placeholder<span class="token operator">=</span><span class="token string">"Type here..."</span>
  v<span class="token operator">-</span>model<span class="token operator">=</span><span class="token string">"searchTerm"</span>
<span class="token operator">&gt;</span></code></pre>
                </div>
                <p>The value of the 'searchTerm' variable will now always match the value of the input.</p>
                <h2 id="searching-the-data" style="position:relative;"><a href="#searching-the-data"
                                                                          aria-label="searching the data permalink"
                                                                          class="anchor before">
                        <svg aria-hidden="true" focusable="false" height="16" version="1.1" viewBox="0 0 16 16"
                             width="16">
                            <path fill-rule="evenodd"
                                  d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                        </svg>
                    </a>Searching the data
                </h2>
                <p>In this case I am using a JSON file which lists all the countries in the world. This will be
                    available in the
                    repo link at the bottom of this article.</p>
                <p>The JSON file is imported and made available to the template:</p>
                <div class="gatsby-highlight" data-language="javascript"><pre class="language-javascript"><code
                            class="language-javascript"><span class="token keyword">import</span> countries <span
                                class="token keyword">from</span> <span
                                class="token string">'./data/countries.json'</span>

<span class="token keyword">return</span> <span class="token punctuation">{</span>
  countries<span class="token punctuation">,</span>
  searchTerm
<span class="token punctuation">}</span></code></pre>
                </div>
                <p>To perform the search we will create the function below:</p>
                <div class="gatsby-highlight" data-language="javascript"><pre class="language-javascript"><code
                            class="language-javascript"><span class="token keyword">import</span> <span
                                class="token punctuation">{</span>ref<span
                                class="token punctuation">,</span> computed<span
                                class="token punctuation">}</span> <span class="token keyword">from</span> <span
                                class="token string">'vue'</span>

<span class="token keyword">const</span> searchCountries <span class="token operator">=</span> <span
                                class="token function">computed</span><span class="token punctuation">(</span><span
                                class="token punctuation">(</span><span class="token punctuation">)</span> <span
                                class="token operator">=&gt;</span> <span class="token punctuation">{</span>
  <span class="token keyword">if</span> <span class="token punctuation">(</span>searchTerm<span
                                class="token punctuation">.</span>value <span class="token operator">===</span> <span
                                class="token string">''</span><span class="token punctuation">)</span> <span
                                class="token punctuation">{</span>
    <span class="token keyword">return</span> <span class="token punctuation">[</span><span
                                class="token punctuation">]</span>
  <span class="token punctuation">}</span>

  <span class="token keyword">let</span> matches <span class="token operator">=</span> <span
                                class="token number">0</span>

  <span class="token keyword">return</span> countries<span class="token punctuation">.</span><span
                                class="token function">filter</span><span class="token punctuation">(</span><span
                                class="token parameter">country</span> <span class="token operator">=&gt;</span> <span
                                class="token punctuation">{</span>
    <span class="token keyword">if</span> <span class="token punctuation">(</span>
      country<span class="token punctuation">.</span>name<span class="token punctuation">.</span><span
                                class="token function">toLowerCase</span><span class="token punctuation">(</span><span
                                class="token punctuation">)</span><span class="token punctuation">.</span><span
                                class="token function">includes</span><span class="token punctuation">(</span>searchTerm<span
                                class="token punctuation">.</span>value<span class="token punctuation">.</span><span
                                class="token function">toLowerCase</span><span class="token punctuation">(</span><span
                                class="token punctuation">)</span><span class="token punctuation">)</span>
      <span class="token operator">&amp;&amp;</span> matches <span class="token operator">&lt;</span> <span
                                class="token number">10</span>
    <span class="token punctuation">)</span> <span class="token punctuation">{</span>
      matches<span class="token operator">++</span>
      <span class="token keyword">return</span> country
    <span class="token punctuation">}</span>
  <span class="token punctuation">}</span><span class="token punctuation">)</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
                </div>
                <p>You can see above I have imported another function from
                    Vue; <a href="https://v3.vuejs.org/guide/computed.html#computed-properties" target="_blank"
                            rel="nofollow noopener noreferrer">computed</a>, which is much the same as in Vue 2. It
                    allows us to create cached methods/functions which will only update when something relevant to the
                    function is updated.</p>
                <p>If the search term is empty then an empty array is returned. If the search term has a
                    value, <a
                        href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/filter"
                        target="_blank" rel="nofollow noopener noreferrer">filter</a> is used
                    to loop through all countries and returns those that contain the search term. I am
                    converting everything to lowercase to help provide more accurate matching, and only showing a
                    maximum of 10 results.</p>
                <h2 id="showing-the-results" style="position:relative;"><a href="#showing-the-results"
                                                                           aria-label="showing the results permalink"
                                                                           class="anchor before">
                        <svg aria-hidden="true" focusable="false" height="16" version="1.1" viewBox="0 0 16 16"
                             width="16">
                            <path fill-rule="evenodd"
                                  d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                        </svg>
                    </a>Showing the results
                </h2>
                <p>Update the template with the following to show the matching countries:</p>
                <div class="gatsby-highlight" data-language="javascript"><pre class="language-javascript"><code
                            class="language-javascript"><span class="token operator">&lt;</span>ul v<span
                                class="token operator">-</span><span class="token keyword">if</span><span
                                class="token operator">=</span><span
                                class="token string">"searchCountries.length"</span><span
                                class="token operator">&gt;</span>
  <span class="token operator">&lt;</span>li<span class="token operator">&gt;</span>
    Showing <span class="token punctuation">{</span><span class="token punctuation">{</span> searchCountries<span
                                class="token punctuation">.</span>length <span class="token punctuation">}</span><span
                                class="token punctuation">}</span> <span class="token keyword">of</span> <span
                                class="token punctuation">{</span><span
                                class="token punctuation">{</span> countries<span class="token punctuation">.</span>length <span
                                class="token punctuation">}</span><span class="token punctuation">}</span> results
  <span class="token operator">&lt;</span><span class="token operator">/</span>li<span
                                class="token operator">&gt;</span>
  <span class="token operator">&lt;</span>li
    v<span class="token operator">-</span><span class="token keyword">for</span><span
                                class="token operator">=</span><span
                                class="token string">"country in searchCountries"</span>
    <span class="token operator">:</span>key<span class="token operator">=</span><span class="token string">"country.name"</span>
  <span class="token operator">&gt;</span>
    <span class="token punctuation">{</span><span class="token punctuation">{</span> country<span
                                class="token punctuation">.</span>name <span class="token punctuation">}</span><span
                                class="token punctuation">}</span>
  <span class="token operator">&lt;</span><span class="token operator">/</span>li<span
                                class="token operator">&gt;</span>
<span class="token operator">&lt;</span><span class="token operator">/</span>ul<span class="token operator">&gt;</span></code></pre>
                </div>
                <p><a href="https://v3.vuejs.org/guide/introduction.html#conditionals-and-loops" target="_blank"
                      rel="nofollow noopener noreferrer">v-if</a> is used to conditionally hide or show the
                    list of results. This is based on the number of results returned from our previously created
                    'searchCountries'
                    function. <a href="https://v3.vuejs.org/guide/introduction.html#conditionals-and-loops"
                                 target="_blank" rel="nofollow noopener noreferrer">v-for</a> is then used to loop
                    through and
                    display every matching result as a list item.</p>
                <h2 id="selecting-a-result" style="position:relative;"><a href="#selecting-a-result"
                                                                          aria-label="selecting a result permalink"
                                                                          class="anchor before">
                        <svg aria-hidden="true" focusable="false" height="16" version="1.1" viewBox="0 0 16 16"
                             width="16">
                            <path fill-rule="evenodd"
                                  d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                        </svg>
                    </a>Selecting a result
                </h2>
                <p>The autocomplete is now functional in that it searches/filters the given data-set based on the user's
                    input. However
                    this isn't very useful if the user can't select a matching option.</p>
                <p>To prepare for the user selecting a matching option we should add the following:</p>
                <div class="gatsby-highlight" data-language="javascript"><pre class="language-javascript"><code
                            class="language-javascript"><span class="token keyword">const</span> <span
                                class="token function-variable function">selectCountry</span> <span
                                class="token operator">=</span> <span class="token punctuation">(</span><span
                                class="token parameter">country</span><span class="token punctuation">)</span> <span
                                class="token operator">=&gt;</span> <span class="token punctuation">{</span>
  selectedCountry<span class="token punctuation">.</span>value <span class="token operator">=</span> country
  searchTerm<span class="token punctuation">.</span>value <span class="token operator">=</span> <span
                                class="token string">''</span>
<span class="token punctuation">}</span>

<span class="token keyword">let</span> selectedCountry <span class="token operator">=</span> <span
                                class="token function">ref</span><span class="token punctuation">(</span><span
                                class="token string">''</span><span class="token punctuation">)</span>

<span class="token keyword">return</span> <span class="token punctuation">{</span>
  countries<span class="token punctuation">,</span>
  searchTerm<span class="token punctuation">,</span>
  searchCountries<span class="token punctuation">,</span>
  selectCountry<span class="token punctuation">,</span>
  selectedCountry
<span class="token punctuation">}</span></code></pre>
                </div>
                <p>With the above added, we now have a 'selectCountry' method which can be called in the template. This
                    will set the value
                    of a new 'selectedCountry' reactive variable. Attach this to a click event in the template and
                    provide the name of the
                    clicked option to the function:</p>
                <div class="gatsby-highlight" data-language="javascript"><pre class="language-javascript"><code
                            class="language-javascript"><span class="token operator">&lt;</span>li
  v<span class="token operator">-</span><span class="token keyword">for</span><span class="token operator">=</span><span
                                class="token string">"country in searchCountries"</span>
  <span class="token operator">:</span>key<span class="token operator">=</span><span
                                class="token string">"country.name"</span>
  @click<span class="token operator">=</span><span class="token string">"selectCountry(country.name)"</span>
<span class="token operator">&gt;</span>
  <span class="token punctuation">{</span><span class="token punctuation">{</span> country<span
                                class="token punctuation">.</span>name <span class="token punctuation">}</span><span
                                class="token punctuation">}</span>
<span class="token operator">&lt;</span><span class="token operator">/</span>li<span class="token operator">&gt;</span></code></pre>
                </div>
                <p>Now when the user selects a country it will be saved to the 'selectedCountry' variable, and the
                    search term will be
                    reset to an empty string which will then close the matching country list.</p>
                <p>One final thing to wrap up is to show a confirmation of the user's selected choice:</p>
                <div class="gatsby-highlight" data-language="javascript"><pre class="language-javascript"><code
                            class="language-javascript"><span class="token operator">&lt;</span>p v<span
                                class="token operator">-</span><span class="token keyword">if</span><span
                                class="token operator">=</span><span class="token string">"selectedCountry"</span><span
                                class="token operator">&gt;</span>
  You have selected<span class="token operator">:</span> <span class="token punctuation">{</span><span
                                class="token punctuation">{</span> selectedCountry <span
                                class="token punctuation">}</span><span class="token punctuation">}</span>
<span class="token operator">&lt;</span><span class="token operator">/</span>p<span
                                class="token operator">&gt;</span></code></pre>
                </div>
                <h2 id="result" style="position:relative;"><a href="#result" aria-label="result permalink"
                                                              class="anchor before">
                        <svg aria-hidden="true" focusable="false" height="16" version="1.1" viewBox="0 0 16 16"
                             width="16">
                            <path fill-rule="evenodd"
                                  d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path>
                        </svg>
                    </a>Result
                </h2>
                <p><img src="{{ asset("vue-3-autocomplete-result.gif") }}" alt="Using the autocomplete search"></p>
            </div>
            <a href="#">
                <button class="rounded-full text-white font-bold bg-blue-500 hover:bg-blue-700 py-3 px-6 mt-4">
                    See On Github
                </button>
            </a>
            <hr class="max-w-5xl mx-auto">
            <div class="flex flex-wrap sm:flex-no-wrap justify-between"><a class="m-2"
                                                                           href="#">«
                    Adding a Markdown editor to Laravel</a><a class="m-2" href="#">&lt;script
                    setup&gt; syntax in Vue 3 »</a></div>

        </div>
        <form class="mt-8 max-w-5xl mx-auto">
            <div class="text-white p-4 rounded-3xl bg-blue-600 lg:p-16 lg:flex lg:items-center">
                <div class="lg:w-0 lg:flex-1 text-white">
                    <h2 class="text-3xl tracking-tight">Sign up for my newsletter</h2>
                    <p class="mt-4 max-w-3xl text-lg text-white">Get notified when I post a new article.
                        Unsubscribe
                        at any time, and I promise not to send any spam :)</p>

                </div>
                <div class="mt-12 sm:w-full sm:max-w-md lg:mt-0 lg:ml-8 md:flex"><label for="email"
                                                                                        class="sr-only">Email
                        address</label><input id="email" name="EMAIL" type="email" autocomplete="email"
                                              required=""
                                              class="w-full border-white text-black px-5 py-3 placeholder-gray-500 focus:outline-none rounded-md"
                                              placeholder="Your email">
                    <button type="submit"
                            class="mt-3 w-full flex items-center justify-center px-5 py-3 border border-transparent
                            text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-400
                            sm:mt-0 sm:ml-3 sm:w-auto sm:flex-shrink-0">
                        Sign up
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection
