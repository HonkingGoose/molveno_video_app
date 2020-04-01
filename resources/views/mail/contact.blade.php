<h1>{{ $contactForm->firstName }} {{ $contactForm->lastName }} has said the following:</h1>

<p>from roomnumber: {{ $contactForm->roomNumber }}</p>

<p>category: {{ $contactForm->category }}</p>
<p>created at: {{ $contactForm->created_at }}</p>
<h2>message</h2>
<p>{{ $contactForm->message }}</p>