
<div class="login-box">
        <form wire:submit.prevent="login">
            @csrf
            <div class="input-box">
                <input type="email" wire:model="email" class="input-field" placeholder="Email" autocomplete="off" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" required>
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="input-box">
                <input type="password" wire:model="password" class="input-field" placeholder="Senha" autocomplete="off" value="{{ old('password') }}" class="@error('password') is-invalid @enderror" required>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="forgot">
                <section>
                    <input type="checkbox" id="remember" wire:model="remember" class="custom-checkbox">
                    <label id="remember-me" for="check">Lembrar de mim</label>
                </section>
                <section>
                    <a href="#">Esqueci minha senha</a>
                </section>
            </div>
            <button type="submit" class="submit-btn" id="submit" wire:loading.attr="disabled">
                <span wire:loading.remove>Entrar</span>
                <span wire:loading>Autenticando...</span>
            </button>
        </form>
        <div class="sign-up-link">
            <p>Não tem uma conta? <a href="{{ route ('register')}}">Crie uma conta</a></p>
        </div>
    </div>

