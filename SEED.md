**데이터 심기**

1. 개요 

 - 라라벨에는 seed 클래스를 사용해서 테스트 데이터를 데이터베이스에 설정하는 간단한 메소드를 포함.

 - seed 클래스는 database/seeds 에 위치함
 
 - 기본적으로 DatabaseSeeder 클래스가 정의 되어있고 call 을 통해 각 시드 클래스를 호출가능
 
2. seeder 를 작성해보자.

 - php artisan make:seeder 명령어를 통해 시더를 생성
 
 - run 메소드에 쿼리빌더 혹은 엘로퀀트 모델 팩토리를 사용가능하다
 
 - 모델 팩토리에 대해서는 잘 몰라서 패스... 문서를 더 확인 해보자
 
3. seeder 의 실행

 - php artisan db:seed 
 
 - 위와 같이 실행하면 DatabaseSeeder 클래스를 실행 
 
 - php artisan db:seed --class=UsersTableSeeder
 
 - 위 처럼 각 개별 seed 클래스를 지정하여 실행가능하다.
 
 - migrate:refresh 명령어는 데이터베이스 초기값을 설정할 때 모든 마이그레이션들을 롤백한 다음 다시 실행하는 명령
