**AUTH 무작정 따라하기**

사용자 인증!? 
그렇다면 일단 로그인 폼을 만들어보자

1. 테이블이 없네? 

 - 생성에 앞서 .env.example file 의 db 설정을 확인하자

 - 일단 user table 마이그래이션 파일이 있으니 php artisan migrate 명령어로 테이블을 생성하자.

 - 테이블이 만들어졌다
 

2. 라라벨의 인증기능?

 - 메뉴얼에 따르면, 라라벨은 인증기능을 매우 쉽게 해준다고 한다.
 
 - config/auth.php 을 보자. 
 
 - guards 와 provider 로 구성 되있다는데?
 
 - guard 는 사용자가 각각의 요청-request 마다 어떻게 인증되는지 정의 (session, token 등)
 
 - provider 는 저장소에서 어떻게 찾아올지 정의 (Eloquent, database)


3. 기본제공 인증 컨트롤러

 - 기본적으로 App\Http\Controllers\Auth 에 인증 컨트롤러를 제공.
 
 - 사용자를 인증하고 새로운 사용자를 저장하는 로직등 트레이트를 포함.

 
4. 라우팅 하기 및 뷰 생성

 - php artisan make:auth 
 
 - 위 명령어를 실행하면 인증에 필요로 하는 라우트와 뷰를 생성해준다 (레이아웃도 생성)
 
 - 이때 HomeController 가 생성되고 라우트가 추가된 것을 확인 할 수 있다.
 
 - 생성된 HomeController 는 당연히 자유롭게 변경 / 삭제 가능하다.
 
 
5. 일단 계정을 생성해볼까?

 - artisan tinker 로 유저를 직접 등록해도 되지만 http://localhost:8000/register 에서 직접 가입해보자.

 - 사용자 등록 성공!
 
 - 계정이 생성되면서 로그인 처리가 된 후 /home 으로 이동하는 것을 확인 하였다.
 
 
6. 로그인 후 경로를 수정해보자.

 - 현재는 /home 으로 이동한다
 
 - App\Http\Controllers\Auth 아래의 LoginController 를 보자
 
 - protected $redirectTo = '/home';  라고 되어있구나.
 
 - protected $redirectTo = '/';  이렇게 바꿔보자.
 
 - 로그인 후 / 로 이동되는 것을 확인 하였다.
 
 - redirectTo 메소드를 정의하여 리다이렉션 시킬수도 있다.
 
 - protected function redirectTo()
   {
       return '/home';
   }
   
 - 위 메소드를 추가하니 메소드가 우선시 되어 다시 /home 으로 이동한다!
 
 
7. 사용할 사용자 이름 변경

 - 기본적으로 라라벨은 인증을 위해 email 을 사용
  
 - 아이디로 변경해보자
 
 - LoginController 에 username() 메소드를 오버라이딩 하여 바꿔보자.
 
 - public function username()
   {
       return 'name';
   }
   
 - 참고로 username 메소드는 AuthenticatesUsers 트레이트에 선언되어있다.
 
 - 참고할 사항으로 뷰단에서도 변경한 인증 필드명으로 바꿔줘야한다. 안그러면 로그인이 되지 않음
 
8. 
 
 

 




**AUTH** 

기본적으로 라라벨은 config/auth.php 을 통해 서비스 동작 제어

guards 와 provider 로 구성

guard 는 사용자가 각각의 요청-request 마다 어떻게 인증되는지 정의 (session, token 등)

provider 는 저장소에서 어떻게 찾아올지 정의 (Eloquent, database)



라라벨은 기본적으로 App\Http\Controllers\Auth 에 인증 컨트롤러를 제공.
사용자를 인증하고 새로운 사용자를 저장하는 로직등 트레이트를 포함



라우팅 make

php artisan make:auth

위와 같은 명령어를 통해 auth 컨트롤러를 생성하자
이때 HomeController 가 생성된다.

make:auth 명령어는 인증에 필요로 하는 모든 뷰를 생성해준다 (레이아웃도 생성)



인증 후 경로 수정

AuthController 의 redirectTo 속성을 정의함으로써 경로 커스터마이징 가능

protected $redirectTo = '/home';

또는 redirectTo 속성 대신에 redirectTo 메소드를 정의하여 커스터마이징 가능
이때 정의된 속성보다 정의된 메소드가 우선시 됨

protected function redirectTo()
{
    return '/home';
}

