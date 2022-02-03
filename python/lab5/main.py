import requests
from bs4 import BeautifulSoup as BS
import pandas as pd

r = requests.get("https://soccer365.ru/competitions/13/")
html = BS(r.content, 'html.parser')
Groups = html.findAll('table', class_='comp_table_v2')
Players = {1: {'Роль': [], 'Команда': [], 'ФИ': [], "Голы": [],
               "Пенальти": [],"Матчи": []},

           2: {'Роль': [], 'Команда': [],
               'ФИ': [], "Пасы": [],
               "Матчи": []},

           3: {'Роль': [], 'Команда': [], 'ФИ': [], "Матчи": [],
               "Штрафные": [], "FairPlay": [],
               "Желтые карточки": [],
               "2ЖК": [], "Красные карточки": []}}
Command = {'Команда': [], 'Очки': [], "Голы": []}
FullTeam = {'Команда': [], 'Игроки': [], 'Матчи': []}
Command_Parse = html.find('table', class_='stngs')
TeamArray = []
Points_Array = []

FullTeamArrayTeam = []
FullTeamArrayMatch = []
FullTeamArrayName = []

for elem in Command_Parse.select('tbody > tr'):
    Team = elem.find_all('td')
    TeamArray.append(Team[1].text)
    Command["Команда"] = TeamArray

    Point = elem.find_all('td')
    Points_Array.append(Point[-1].text.replace(u'\n', u''))
    Command["Очки"] = Points_Array
for data in Groups:
    Title = data.find('th', class_='title')
    Title = Title.text.replace(u'\xa0', u'')
    if Title == "Бомбардиры":
        TitleArray = []
        TeamArray = []
        NameArray = []
        GoalsArray = []
        PenaltyArray = []
        MatchArray = []
        for elem in data.select('tbody > tr'):
            Teams = elem.find('td').find('img')['title']
            FullTeamArrayTeam.append(Teams)
            FullTeam["Команда"] = FullTeamArrayTeam
            Matchs = elem.find_all('td', class_='bkcenter')[2].text.replace(u'\xa0', u'')
            FullTeamArrayMatch.append(Matchs)
            FullTeam["Матчи"] = FullTeamArrayMatch
            Names = elem.find('td').find('span').find('a').text
            FullTeamArrayName.append(Names)
            FullTeam["Игроки"] = FullTeamArrayName

            TitleArray.append(Title)
            Players[1]["Роль"] = TitleArray

            Team = elem.find('td').find('img')['title']
            TeamArray.append(Team)
            Players[1]["Команда"] = TeamArray

            Name = elem.find('td').find('span').find('a').text
            NameArray.append(Name)
            Players[1]["ФИ"] = NameArray

            Goals = elem.find_all('td', class_='bkcenter')[0].text.replace(u'\xa0', u'')
            GoalsArray.append(Goals)
            Players[1]["Голы"] = GoalsArray

            Penalty = elem.find_all('td', class_='bkcenter')[1].text.replace(u'\xa0', u'')
            PenaltyArray.append(Penalty)
            Players[1]["Пенальти"] = PenaltyArray

            Match = elem.find_all('td', class_='bkcenter')[2].text.replace(u'\xa0', u'')
            MatchArray.append(Match)
            Players[1]["Матчи"] = MatchArray
    if Title == "Ассистенты":
        TitleArray = []
        TeamArray = []
        NameArray = []
        PasArray = []
        MatchArray = []
        for elem in data.select('tbody > tr'):
            Teams = elem.find('td').find('img')['title']
            FullTeamArrayTeam.append(Teams)
            FullTeam["Команда"] = FullTeamArrayTeam
            Matchs = elem.find_all('td', class_='bkcenter')[-1].text.replace(u'\xa0', u'')
            FullTeamArrayMatch.append(Matchs)
            FullTeam["Матчи"] = FullTeamArrayMatch
            Names = elem.find('td').find('span').find('a').text
            FullTeamArrayName.append(Names)
            FullTeam["Игроки"] = FullTeamArrayName

            TitleArray.append(Title)
            Players[2]["Роль"] = TitleArray

            Team = elem.find('td').find('img')['title']
            TeamArray.append(Team)
            Players[2]["Команда"] = TeamArray

            Name = elem.find('td').find('span').find('a').text
            NameArray.append(Name)
            Players[2]["ФИ"] = NameArray

            Pas = elem.find('td', class_='bkcenter').find('b').text
            PasArray.append(Pas)
            Players[2]["Пасы"] = PasArray

            Match = elem.find_all('td', class_='bkcenter')[1].text.replace(u'\xa0', u'')
            MatchArray.append(Match)
            Players[2]["Матчи"] = MatchArray
    if Title == "Штрафники":
        TitleArray = []
        TeamArray = []
        NameArray = []
        FairPlay = []
        MatchArray = []
        FairPlayArray = []
        PenaltiesArray = []
        YellowCardArray = []
        YellowRedCardArray = []
        RedCardArray = []
        for elem in data.select('tbody > tr'):
            Teams = elem.find('td').find('img')['title']
            FullTeamArrayTeam.append(Teams)
            FullTeam["Команда"] = FullTeamArrayTeam
            Matchs = elem.find_all('td', class_='bkcenter')[-1].text.replace(u'\xa0', u'')
            FullTeamArrayMatch.append(Matchs)
            FullTeam["Матчи"] = FullTeamArrayMatch
            Names = elem.find('td').find('span').find('a').text
            FullTeamArrayName.append(Names)
            FullTeam["Игроки"] = FullTeamArrayName

            TitleArray.append(Title)
            Players[3]["Роль"] = TitleArray

            Team = elem.find('td').find('img')['title']
            TeamArray.append(Team)
            Players[3]["Команда"] = TeamArray

            Name = elem.find('td').find('span').find('a').text
            NameArray.append(Name)
            Players[3]["ФИ"] = NameArray

            Match = elem.find_all('td', class_='bkcenter')[4].text.replace(u'\xa0', u'')
            MatchArray.append(Match)
            Players[3]["Матчи"] = MatchArray

            Penalties = elem.find_all('td', class_='bkcenter')[3].text.replace(u'\xa0', u'0')
            PenaltiesArray.append(Penalties)
            Players[3]["Штрафные"] = PenaltiesArray

            FairPlay = elem.find_all('td', class_='bkcenter')[0].text.replace(u'\xa0', u'')
            FairPlayArray.append(FairPlay)
            Players[3]["FairPlay"] = FairPlay

            YellowCard = elem.find_all('td', class_='bkcenter')[1].text
            YellowCardArray.append(YellowCard)
            Players[3]["Желтые карточки"] = YellowCardArray

            YellowRedCard = elem.find_all('td', class_='bkcenter')[2].text.replace(u'\xa0', u'')
            YellowRedCardArray.append(YellowRedCard)
            Players[3]["2ЖК"] = YellowRedCardArray

            RedCard = elem.find_all('td', class_='bkcenter')[3].text.replace(u'\xa0', u'')
            RedCardArray.append(RedCard)
            Players[3]["Красные карточки"] = RedCardArray

# Подсчет корреляции
def CorGoals_Points():
    TeamArray_last = []
    PointsArray_last = []
    echo = pd.DataFrame(Players[1])
    echo["Голы"] = pd.to_numeric(echo["Голы"])
    echo_group = echo.groupby('Команда', as_index=False)["Голы"].sum()
    est = echo_group.sort_values("Голы", ascending=False)
    for i, val in enumerate(Command['Команда']):
        for j, vals in enumerate(echo_group['Команда']):
            if Command['Команда'][i] == echo_group['Команда'][j]:
                TeamArray_last.append(Command['Команда'][i])
                PointsArray_last.append(Command['Очки'][i])
    Command["Команда"] = TeamArray_last
    Command["Очки"] = PointsArray_last
    Command["Голы"] = est["Голы"].values
    Command["Очки"] = pd.to_numeric(Command["Очки"])
    Command["Голы"] = pd.to_numeric(Command["Голы"])
    df = pd.DataFrame(Command)
    print("Корреляция: " + str(df.corr().loc['Голы', 'Очки']))

# Игроки, которые отыграли не все матчи своей команды
def NotAllGame(echo):
    echo_max = echo.groupby('Команда', as_index=False)['Матчи'].max()
    dict_echo_max = echo_max.to_dict()
    print("Список игроков, которые участвовали не во всех играх своей команды.\n")
    for i, val in enumerate(echo['Команда']):
        for j, vals in enumerate(dict_echo_max['Команда']):
            if echo['Команда'][i] == dict_echo_max['Команда'][j] and echo['Матчи'][i] < dict_echo_max['Матчи'][j]:
                print(str(echo['Игроки'][i]) + " / " + str(echo['Команда'][i]) + " / " + str(echo['Матчи'][i]))

# Вывод команд по желтым карточкам или голам
def Group(echo, name):
    echo[name] = pd.to_numeric(echo[name])
    echo_group = echo.groupby('Команда', as_index=False)[name].sum()
    est = echo_group.sort_values(name, ascending=False).head(3)
    print(est)

# Процент голы пенальти
def GoalsProcent(echo):
    Array_Team = {"Команда": [], "Процент": [], }
    echo["Голы"] = pd.to_numeric(echo['Голы'])
    echo["Пенальти"] = pd.to_numeric(echo['Пенальти'])
    echo_group = echo.groupby('Команда', as_index=False)[['Голы', 'Пенальти']].sum()
    dict_echo_ = echo_group.to_dict()
    for i, val in enumerate(dict_echo_['Команда']):
        Array_Team["Команда"].append(dict_echo_['Команда'][i])
        if dict_echo_['Пенальти'][i] == 0:
            Procent = 0
            Array_Team["Процент"].append(str(round(Procent, 1)))
        else:
            Procent = (dict_echo_['Пенальти'][i] / dict_echo_['Голы'][i]) * 100
            Array_Team["Процент"].append(str(round(Procent, 1)))
    TeamProcent = pd.DataFrame(Array_Team)
    print("Доля пенальти по отношению к числу голов для каждой команды.")
    print(TeamProcent)

# Вывод таблицы и значений
def echoDataFrame(keys):
    echo = pd.DataFrame(Players[keys])
    AllteamDf = pd.DataFrame(FullTeam)
    print(echo)
    print("\n")
    if keys == 1:
        print("Первая тройка команд по числу забитых голов с выводом их числа.")
        Group(echo, "Голы")
        print("\n")
        NotAllGame(AllteamDf)
        print("\n")
        GoalsProcent(echo)
        print("\n")
    if keys == 3:
        print("Первая тройка команд по числу желтых карточек.")
        Group(echo, "Желтые карточки")
        print("\n")

while True:
    try:
        print("Выберите чтол хотите посмотреть: \n 1. Бомбардиры \n 2. Ассистенты \n 3. Штрафники \n 4.Корреляция")
        key = int(input("Введите цифру ----> "))
        if key != 4:
            echoDataFrame(key)
        else:
            CorGoals_Points()
        break
    except ValueError:
        print("Ой! Это некорректное число. Попробуйте ещё раз...")







