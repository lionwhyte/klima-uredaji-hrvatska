@if ($errors->any())
    <div class="alert alert-success text-red-500 font-semibold border-2 border-red-500 p-4">
        Greška! Poruka nije poslana.
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success text-green-500 font-semibold border-2 border-green-500 p-4">
        {{ session('success') }}
    </div> 
@endif

<form action="{{ route('kontakt.submit') }}" method="post" class="flex flex-col my-4">
    @csrf
    <label for="name">Vaše ime (obavezno)</label>
    <input class="mb-4 px-1 py-2 text-slate-300 bg-slate-600 rounded" type="text" id="name" name="name" value="{{old('name')}}">
    @error('name')
        <p class="text-red-500 font-semibold mb-4">{{$message}}</p>
    @enderror
    <label for="email">Vaša e-pošta (obavezno) (molimo da pripazite na točnost e-mail adrese)</label>
    <input class="mb-4 px-1 py-2 text-slate-300 bg-slate-600 rounded" type="text" id="email" name="email" value="{{old('email')}}">
    @error('email')
        <p class="text-red-500 font-semibold mb-4">{{$message}}</p>
    @enderror
    <label for="phone">Telefon (obavezno)</label>
    <input class="mb-4 px-1 py-2 text-slate-300 bg-slate-600 rounded" type="text" id="phone" name="phone" value="{{old('phone')}}">
    @error('phone')
        <p class="text-red-500 font-semibold mb-4">{{$message}}</p>
    @enderror
    <label for="city">Grad ili mjesto obavljanja posla (obavezno)</label>
    <input class="mb-4 px-1 py-2 text-slate-300 bg-slate-600 rounded" type="text" id="city" name="city" value="{{old('city')}}">
    @error('city')
        <p class="text-red-500 font-semibold mb-4">{{$message}}</p>
    @enderror
    <label for="subject">Predmet</label>
    <input class="mb-4 px-1 py-2 text-slate-300 bg-slate-600 rounded" type="text" id="subject" name="subject" value="{{old('subject')}}">
    @error('subject')
        <p class="text-red-500 font-semibold mb-4">{{$message}}</p>
    @enderror
    <label for="message">Vaša poruka</label>
    <textarea class="mb-4 px-1 py-2 text-slate-300 bg-slate-600 rounded" name="message" id="message" cols="30" rows="10">{{old('message')}}</textarea>
    @error('message')
        <p class="text-red-500 font-semibold mb-4">{{$message}}</p>
    @enderror
    <button
        class="w-40 px-1 py-2 text-slate-300 bg-slate-600 rounded border border-sky-500 translate duration-150 hover:border-sky-600"
        type="submit">Pošalji</button>
</form>