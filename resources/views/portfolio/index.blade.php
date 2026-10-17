@extends('layouts.portfolio')

@section('title', $profile->full_name . ' - Portafolio Profesional')

@section('content')

<!-- ============ HERO / INICIO ============ -->
<section id="inicio" class="gradient-bg text-white pt-28 pb-20 px-4">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-10">
        <div class="flex-1 text-center md:text-left fade-in">
            <p class="text-secondary-200 text-lg mb-2 uppercase tracking-widest" style="color:#93c5fd;">Desarrollador Web Full Stack</p>
            <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $profile->full_name }}</h1>
            <p class="text-xl mb-6 opacity-90">{{ $profile->title }}</p>
            <p class="text-base mb-8 opacity-80 max-w-xl leading-relaxed">{{ Str::limit($profile->bio, 180) }}</p>
            <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                <a href="#contacto" class="bg-accent hover:bg-yellow-500 text-white font-semibold px-6 py-3 rounded-full transition shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i>Contáctame
                </a>
                <a href="#proyectos" class="border-2 border-white/50 hover:bg-white/10 text-white font-semibold px-6 py-3 rounded-full transition">
                    <i class="fas fa-briefcase mr-2"></i>Ver Proyectos
                </a>
            </div>
            <div class="flex gap-5 mt-8 justify-center md:justify-start text-2xl">
                @if($profile->github_url)
                    <a href="{{ $profile->github_url }}" target="_blank" class="hover:text-accent transition"><i class="fab fa-github"></i></a>
                @endif
                @if($profile->linkedin_url)
                    <a href="{{ $profile->linkedin_url }}" target="_blank" class="hover:text-accent transition"><i class="fab fa-linkedin"></i></a>
                @endif
                <a href="mailto:{{ $profile->email }}" class="hover:text-accent transition"><i class="fas fa-envelope"></i></a>
                <a href="tel:{{ $profile->phone }}" class="hover:text-accent transition"><i class="fas fa-phone"></i></a>
            </div>
        </div>
        <div class="flex-shrink-0">
            @if($profile->photo_path)
                <img src="{{ asset($profile->photo_path) }}" alt="{{ $profile->full_name }}"
                    class="w-56 h-56 md:w-72 md:h-72 rounded-full object-cover shadow-2xl border-4 border-white/30">
            @else
                <div class="w-56 h-56 md:w-72 md:h-72 rounded-full bg-gradient-to-br from-accent to-secondary flex items-center justify-center text-8xl shadow-2xl border-4 border-white/30">
                    <i class="fas fa-user-tie text-white/90"></i>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- ============ PERFIL ============ -->
<section id="perfil" class="py-20 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-3 text-primary">Perfil Profesional</h2>
        <div class="w-20 h-1 bg-accent mx-auto mb-12 rounded"></div>
        <div class="grid md:grid-cols-2 gap-10 items-start">
            <div>
                <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ $profile->bio }}</p>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="flex items-center gap-2"><i class="fas fa-map-marker-alt text-secondary w-5"></i><span>{{ $profile->city }}, {{ $profile->state }}</span></div>
                    <div class="flex items-center gap-2"><i class="fas fa-flag text-secondary w-5"></i><span>{{ $profile->nationality }}</span></div>
                    <div class="flex items-center gap-2"><i class="fas fa-envelope text-secondary w-5"></i><span class="truncate">{{ $profile->email }}</span></div>
                    <div class="flex items-center gap-2"><i class="fas fa-phone text-secondary w-5"></i><span>{{ $profile->phone }}</span></div>
                    <div class="flex items-center gap-2"><i class="fas fa-birthday-cake text-secondary w-5"></i><span>{{ $profile->birth_date?->format('d/m/Y') }}</span></div>
                    <div class="flex items-center gap-2"><i class="fas fa-language text-secondary w-5"></i><span>{{ implode(', ', $profile->languages_array) }}</span></div>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 shadow-sm">
                <h3 class="font-bold text-lg mb-4 text-primary"><i class="fas fa-info-circle mr-2 text-secondary"></i>Información de Contacto</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex justify-between border-b pb-2"><span class="text-gray-500">Dirección:</span><span class="font-medium">{{ $profile->address }}</span></li>
                    <li class="flex justify-between border-b pb-2"><span class="text-gray-500">Código Postal:</span><span class="font-medium">{{ $profile->postal_code }}</span></li>
                    <li class="flex justify-between border-b pb-2"><span class="text-gray-500">Tel. Celular:</span><span class="font-medium">{{ $profile->phone }}</span></li>
                    <li class="flex justify-between border-b pb-2"><span class="text-gray-500">Tel. Fijo:</span><span class="font-medium">{{ $profile->phone_alt }}</span></li>
                    <li class="flex justify-between border-b pb-2"><span class="text-gray-500">Estado Civil:</span><span class="font-medium">{{ $profile->marital_status }}</span></li>
                    <li class="flex justify-between"><span class="text-gray-500">País:</span><span class="font-medium">{{ $profile->country }}</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ============ EXPERIENCIA ============ -->
<section id="experiencia" class="py-20 px-4 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-3 text-primary">Experiencia Laboral</h2>
        <div class="w-20 h-1 bg-accent mx-auto mb-12 rounded"></div>
        <div class="relative border-l-2 border-secondary/30 pl-8 space-y-10">
            @foreach($experiences as $exp)
            <div class="relative card-hover bg-white rounded-xl p-6 shadow-sm">
                <div class="absolute -left-[42px] top-6 w-5 h-5 rounded-full bg-secondary border-4 border-white shadow"></div>
                <div class="flex flex-wrap justify-between items-start gap-2 mb-2">
                    <h3 class="text-xl font-bold text-gray-800">{{ $exp->job_title }}</h3>
                    <span class="bg-primary/10 text-primary text-xs font-semibold px-3 py-1 rounded-full">{{ $exp->period }}</span>
                </div>
                <p class="text-secondary font-medium mb-3"><i class="fas fa-building mr-1"></i>{{ $exp->company }} <span class="text-gray-400">| {{ $exp->location }}</span></p>
                <p class="text-gray-600 text-sm leading-relaxed whitespace-pre-line">{{ $exp->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ EDUCACIÓN ============ -->
<section id="educacion" class="py-20 px-4 bg-white">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-3 text-primary">Educación y Certificaciones</h2>
        <div class="w-20 h-1 bg-accent mx-auto mb-12 rounded"></div>
        <div class="grid md:grid-cols-2 gap-6">
            @foreach($education as $edu)
            <div class="card-hover bg-gray-50 rounded-xl p-6 border-l-4 border-secondary">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-bold text-gray-800">{{ $edu->degree }}</h3>
                    @if($edu->current)
                        <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">En curso</span>
                    @endif
                </div>
                <p class="text-secondary text-sm font-medium mb-1"><i class="fas fa-graduation-cap mr-1"></i>{{ $edu->institution }}</p>
                <p class="text-gray-500 text-xs mb-2"><i class="far fa-calendar mr-1"></i>{{ $edu->period }} @if($edu->location) · {{ $edu->location }} @endif</p>
                @if($edu->grade)
                    <p class="text-accent text-sm font-semibold"><i class="fas fa-star mr-1"></i>{{ $edu->grade }}</p>
                @endif
                @if($edu->description)
                    <p class="text-gray-600 text-sm mt-2">{{ $edu->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ HABILIDADES ============ -->
<section id="habilidades" class="py-20 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-3 text-primary">Habilidades Técnicas</h2>
        <div class="w-20 h-1 bg-accent mx-auto mb-12 rounded"></div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($skills as $category => $group)
            <div class="bg-white rounded-xl p-6 shadow-sm">
                <h3 class="font-bold text-primary mb-5 text-lg border-b pb-2">
                    <i class="fas fa-layer-group mr-2 text-secondary"></i>{{ $category }}
                </h3>
                <div class="space-y-4">
                    @foreach($group as $skill)
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="font-medium text-gray-700">{{ $skill->name }}</span>
                            <span class="text-gray-500">{{ $skill->level }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="skill-bar bg-gradient-to-r from-primary to-secondary h-2 rounded-full" style="width: {{ $skill->level }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============ PROYECTOS ============ -->
<section id="proyectos" class="py-20 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-3 text-primary">Proyectos Destacados</h2>
        <div class="w-20 h-1 bg-accent mx-auto mb-12 rounded"></div>
        @if($projects->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
            <div class="card-hover bg-gray-50 rounded-xl overflow-hidden shadow-sm border border-gray-100">
                <div class="gradient-bg h-32 flex items-center justify-center text-white">
                    <i class="fas fa-laptop-code text-5xl opacity-80"></i>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg mb-2 text-gray-800">{{ $project->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($project->description, 120) }}</p>
                    @if($project->technologies)
                    <div class="flex flex-wrap gap-1 mb-4">
                        @foreach($project->technologies_array as $tech)
                        <span class="bg-primary/10 text-primary text-xs px-2 py-1 rounded">{{ trim($tech) }}</span>
                        @endforeach
                    </div>
                    @endif
                    <div class="flex gap-3 text-sm">
                        @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="text-secondary hover:underline"><i class="fab fa-github mr-1"></i>Código</a>
                        @endif
                        @if($project->demo_url)
                            <a href="{{ $project->demo_url }}" target="_blank" class="text-secondary hover:underline"><i class="fas fa-external-link-alt mr-1"></i>Demo</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center text-gray-500">Próximamente se publicarán los proyectos.</p>
        @endif
    </div>
</section>

<!-- ============ CONTACTO ============ -->
<section id="contacto" class="py-20 px-4 gradient-bg text-white">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-3">Contáctame</h2>
        <div class="w-20 h-1 bg-accent mx-auto mb-12 rounded"></div>
        <div class="grid md:grid-cols-2 gap-10">
            <div>
                <h3 class="text-xl font-bold mb-6">Información de Contacto</h3>
                <ul class="space-y-4">
                    <li class="flex items-center gap-3"><i class="fas fa-envelope bg-white/20 w-10 h-10 rounded-full flex items-center justify-center"></i>{{ $profile->email }}</li>
                    <li class="flex items-center gap-3"><i class="fas fa-phone bg-white/20 w-10 h-10 rounded-full flex items-center justify-center"></i>{{ $profile->phone }}</li>
                    <li class="flex items-center gap-3"><i class="fas fa-map-marker-alt bg-white/20 w-10 h-10 rounded-full flex items-center justify-center"></i>{{ $profile->city }}, {{ $profile->state }}, {{ $profile->country }}</li>
                </ul>
                <div class="flex gap-4 mt-8 text-2xl">
                    @if($profile->github_url)<a href="{{ $profile->github_url }}" target="_blank" class="hover:text-accent transition"><i class="fab fa-github"></i></a>@endif
                    @if($profile->linkedin_url)<a href="{{ $profile->linkedin_url }}" target="_blank" class="hover:text-accent transition"><i class="fab fa-linkedin"></i></a>@endif
                </div>
            </div>
            <div>
                @if(session('success'))
                    <div class="bg-green-500/90 text-white p-4 rounded-lg mb-4 text-sm">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('portfolio.contact') }}" class="space-y-4">
                    @csrf
                    <div>
                        <input type="text" name="name" placeholder="Tu nombre" required
                            class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 placeholder-white/70 text-white focus:outline-none focus:ring-2 focus:ring-accent">
                        @error('name') <p class="text-red-300 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Tu correo electrónico" required
                            class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 placeholder-white/70 text-white focus:outline-none focus:ring-2 focus:ring-accent">
                        @error('email') <p class="text-red-300 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <input type="text" name="subject" placeholder="Asunto"
                            class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 placeholder-white/70 text-white focus:outline-none focus:ring-2 focus:ring-accent">
                    </div>
                    <div>
                        <textarea name="message" rows="4" placeholder="Tu mensaje" required
                            class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/30 placeholder-white/70 text-white focus:outline-none focus:ring-2 focus:ring-accent"></textarea>
                        @error('message') <p class="text-red-300 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="w-full bg-accent hover:bg-yellow-500 text-white font-bold py-3 rounded-lg transition shadow-lg">
                        <i class="fas fa-paper-plane mr-2"></i>Enviar Mensaje
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
